### Custom commands
Можно создавать кастомные команды. Например, в sxope-ocean это pipeline:run, либо bq_to_spanner, send_flush_cache и другие.
Чтобы создать custom команду:
```shell
php artisan make:command SendEmails
```

После создания команды следует заполнить свойства $signature - это слова по которым команда будет запускаться (
```shell
bq_to_spanner:load
pipeline:run
```
),
а также свойство $description - краткое описание команды.

По умолчанию, при вызове этой команды будет исполняться метод handle(). С помощью service-container, Laravel внедрит все необходимые зависимости,
типы которых объявлены в этом методе:
namespace App\Console\Commands;
```php
use App\Models\User;
use App\Support\DripEmailer;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * Name and signature of the command.
     *
     * @var string
     */
    protected $signature = 'mail:send {user}';

    /**
     * Descriptions of console command.
     *
     * @var string
     */
    protected $description = 'Send a marketing email to a user';

    /**
     * Get the new object of a command.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute console command.
     *
     * @param  \App\Support\DripEmailer  $drip
     * @return mixed
     */
    public function handle(DripEmailer $drip)
    {
        $drip->send(User::find($this->argument('user')));
    }
}
```

Хорошей практикой является делать максимально простые консольные команды с делегированием своих задач службам приложения.
Дальше пойдут Action classes, туда надо помещать всю основную логику, но об этом потом. Пока ради практики можете помещать логику прям в handle().
