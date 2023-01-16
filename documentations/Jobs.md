### Jobs

Чтобы создать job, используем:
```shell
php artisan make:job UserFiller
```

Сгенерированный класс будет реализовывать интерфейс ShouldQueue, что означает: задание должно быть поставлено в очередь
для асинхронного выполнения.

Классы задания очень простые, обычно они содержат только метод handle(), который вызывается, когда задание обрабатывается очередью.
В sxope-ocean это итоговый метод getQuery.

Если мы хотим создать экземпляр класса в конструкторе без отношений (то есть без подчиненных таблиц), используем ->withoutRelations():
```php
/**
* Создать новый экземпляр задания.
*
* @param  \App\Models\Podcast  $podcast
* @return void
*/
public function __construct(Podcast $podcast)
{
    $this->podcast = $podcast->withoutRelations();
}
```

В некоторых случаях может потребоваться, чтобы задание было уникальным и поставить TIMEOUT на запуск задания.
Для этого вы можете определить свойства или методы uniqueId и uniqueFor в своем классе задания:
```php
use App\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class UpdateSearchIndex implements ShouldQueue, ShouldBeUnique
{
    /**
     * Экземпляр продукта.
     *
     * @var \App\Product
     */
    public $product;

    /**
     * Количество секунд, по истечении которых уникальная блокировка задания будет снята.
     *
     * @var int
     */
    public $uniqueFor = 3600;

    /**
     * Уникальный идентификатор задания.
     *
     * @return string
     */
    public function uniqueId()
    {
        return $this->product->id;
    }
}
```
В приведенном выше примере задание UpdateSearchIndex уникально по идентификатору продукта.
Таким образом, любые новые отправленные задания с тем же идентификатором продукта будут игнорироваться,
пока существующее задание не завершит обработку. Кроме того, если существующее задание не будет обработано в течение одного часа,
уникальная блокировка будет снята, и в очередь может быть отправлено другое задание с таким же уникальным ключом.

За кулисами, когда отправляется задание ShouldBeUnique, Laravel пытается получить блокировку с ключом uniqueId.
Если блокировка не получена, задание не отправляется. Эта блокировка снимается, когда задание завершает обработку
или терпит неудачу во всех повторных попытках. По умолчанию Laravel будет использовать драйвер кеша, назначенный по умолчанию,
для получения этой блокировки. Однако, если вы хотите использовать другой драйвер для получения блокировки,
вы можете определить метод uniqueVia, возвращающий драйвер кеша, который следует использовать:
use Illuminate\Support\Facades\Cache;
```php
class UpdateSearchIndex implements ShouldQueue, ShouldBeUnique
{
    /**
     * Получить драйвер кеша для блокировки уникального задания.
     *
     * @return \Illuminate\Contracts\Cache\Repository
     */
    public function uniqueVia()
    {
        return Cache::driver('redis');
    }
}
```
Вместо ограничения частоты в методе handle мы могли бы определить посредника задания, который обрабатывает ограничение частоты.
В Laravel нет места по умолчанию для посредников заданий, поэтому вы можете разместить их в любом месте вашего приложения.
В этом примере мы поместим его в каталог app/Jobs/Middleware:
```php
namespace App\Jobs\Middleware;

use Illuminate\Support\Facades\Redis;

class RateLimited
{
    /**
     * Обработать задание в очереди.
     *
     * @param  mixed  $job
     * @param  callable  $next
     * @return mixed
     */
    public function handle($job, $next)
    {
        Redis::throttle('key')
            ->block(0)->allow(1)->every(5)
            ->then(function () use ($job, $next) {
                // Блокировка получена ...

                $next($job);
            }, function () use ($job) {
                // Не удалось получить блокировку ...

                $job->release(5);
            });
    }
}
```
После создания посредника задания он может быть назначен заданию, вернув их из метода middleware задания.
Этот метод не существует для заданий, созданных с помощью команды make:job Artisan,
поэтому вам нужно будет вручную добавить его в свой класс задания:
```php
use App\Jobs\Middleware\RateLimited;

/**
 * Получить посредника, через которого должно пройти задание.
 *
 * @return array
 */
public function middleware()
{
    return [new RateLimited];
}
```
