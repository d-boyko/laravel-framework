### ModelsAdditionalInfo

Laravel содержит ORM-библиотеку Eloquent. Все дружно поняли, что такое ORM-библиотеку, ага, конечно.
ORM - Object Relational Mapping, это библиотека, которая позволяет взаимодействовать с базой данных в рамках концептах ООП.
Также это может означать Object Role Model. При использовании Eloquent каждая таблица БД имеет Модель, которая используется
для взаимодействия с таблицей.
Создайте базу mysql, вот мои конфиг в .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

### Создание моделей
Чтобы создать модель, используем:

```shell
php artisan make:model Post
```
Чтобы создать модель сразу с миграцией:
```shell
php artisan make:model Post --migration
php artisan make:model Post -m
```
Можно комбинировать флаги, например:
```shell
php artisan make:model Post -mfsc
```
^ Это создает модель, миграцию, фабрику, сид, контроллер

О том, что такое фабрика и сид - позже.
Созданные модели находятся в app\Models.

### Соглашение по именованию моделей
По умолчанию при создании модели Post, Laravel подразумевает, что эта модель будет связана с таблицей posts в базе данных
Тоже самое: модель User - табличка users

### Конфигурация моделей
Бывают такие кейсы, в которых нужно другое название таблицы, например:
Модель Post - таблица history_posts;
Тогда в классе модели можно просто указать protected свойство

```php
protected $table = 'history_posts';
```

Предполагается из коробки, что первичным ключом в каждой таблицы будет 'id', но если он у нас другой, то в классе модели:
```php
protected $primaryKey = 'another_name_of_primary_key';
```

Laravel также предполагает, что primary key является auto-incrementing (т.е. увеличивающимся автоматически на 1) integer.
Но если, например, у нас есть табличка currencies (валюты), то удобнее держать primary key в виде названия валюты, т.е string.
Тогда в модели указываем:
```php
public $incrementing = false;
protected $keyType = 'string';
```

Составные первичные ключи не поддерживаются Eloquent, но можно создать дополнительные уникальные индексы к таблицам БД

В каждой табличке Laravel автоматически определит две колонки: created_at, updated_at. Если не хотим их видеть:
```php
public $timestamps = false;
```

Если мы хотим поменять формат даты в колонках:
```
protected $dateFormat = 'U';
```

Если мы хотим изменить начальные имена created_at, updated_at колонок, то в классе модели:
```php
CONST CREATED_AT = 'creation_date';
CONST UPDATED_AT = 'updated_date';
```

Если хотим указать не дефолтное значение в подключении к БД, то:
```
protected $connection = 'another_connection';
```

Если хотим указать стандартное значение для определенных полей, то:
```php
protected $attributes = [
    'name' => 'Danya';
];
```

### Отношения
Как мы знаем, есть три типа отношений.
1) Один к одному
2) Один ко многим
3) Многие ко многим

Конкретно в этом проекте:
1) User - Post: один ко многим
2) User - Phone: один к одному

Надеюсь не нужно пояснять почему отношения называются именно так. Все-таки проходили Stepic SQL.

Чтобы определить отношения моделей (пример на моем проекте):
1) В модели User определяем метод post(), в котором пишем:
```php
/**
* @return HasMany
*/
public function posts(): HasMany
{
    return $this->hasMany(Post::class, 'user_id');
}
```
Laravel сам подхватит внешний ключ (user_id), по которому он будет связывать две модели,
если он соответствует стандартам Laravel, но при желании его можно указать.
Тут мы вернули hasMany, так как отношение 1 User - Много Posts.

2) Тогда в модели Post, создаем метод user():
```php
/**
* @return belongsTo
*/
public function user(): belongsTo
{
    return $this->belongsTo(User::class)
}
```
^ Здесь также можно указывать внешний ключ, если конечно он не соответствует стандартам Laravel или вы хотите наглядно его видеть.
Тут мы вернули belongsTo, так как эта модели прикручена к одному User.

3) Если рассматриваем отношение User - Phone: один к одному: <br>
    3.1) В модели User:
```php
/**
 * @return HasOne
 */
public function phone(): HasOne
{
    return $this->hasOne(Phone::class, 'user_id');
}
```
3.2) Тогда в модели Phone:
```php
/**
 * @return BelongsTo
 */
public function user(): BelongsTo
{
     return $this->belongsTo(User::class);
}
```

4) Сейчас очень важно, если же у нас многие ко многим:<br>
    4.1) В первой модели все также $this->hasMany(<model instance>); <br>
        4.2) Во второй модели уже НЕ $this->belongsTo, а $this->belongsToMany(<model instance>);

Мы можем легко получить связанную запись, если мы говорим про отношение один-к-одному:
```php
$phone = User::find(1)->phone;
```
1 - это ID, он может быть любым, который есть в базе данных.
ВНИМАНИЕ! ->phone и ->phone(), это СОВЕРШЕННО РАЗНЫЕ ВЕЩИ. Я очень долго искал у себя ошибку в коде, а оказалось из-за вот этого недочета.

Теперь поговорим о том, как получать данные по отношению один-ко-многим:
```php
$posts = User::find(1)->posts;
foreach ($posts as $post) {
    // some beautiful code here
}
```

А вот так можно получать конкретное поле, если говорить про обратное отношение к одному
(т.е. посты могут принадлежать только одному юзеру, они не могут принадлежать сразу двум одновременно):
```php
$user = Post::find(1);
return $user->post->title;
```

Теперь про говорим о получение сортированных данных по отношению один-ко-многим:
Например, хотим получить самый новый заказ пользователя.
У нас тут отношение один ко многим, так как у одного пользователя может быть несколько заказов.
Но у заказов может быть только один владелец (в данном случае пользователь).
```php
public function getLatestOrder()
{
    return $this->hasOne(Order::class)->latestOfMany();
}
```

```php
/**
 * Получить самый старый заказ пользователя
 */
public function oldestOrder()
{
    return $this->hasOne(Order::class)->oldestOfMany();
}
```
Надеюсь под капотом у Laravel понятно что происходит при вызове latestOfMany метода (просто сортировка order by desc created_at).
Но мы можем и кастомизировать эту сортировку, сейчас напишу код по которому все будет понятно:
```php
public function largestOrder()
{
    return $this->hasOne(Order::class)->ofMany('price', 'max');
}
```
Если кто-то не понял - самый дорогой заказ пользователя.
Также можно строить немного более сложные запросы:
```php
/**
* Получить актуальную цену на продукт
*/
public function currentPricing()
{
    return $this->hasOne(Price::class)->ofMany([
        'published_at' => 'max',
        'id' => 'max',
    ], function ($query) {
        $query->where('published_at', '<', now());
    });
}
```

Так как это все Eloquent, то нам доступы и все методы Eloquent:
```php
$posts = User::find(1)->posts()
->where('title', '=', 'foo')
->first();
```

Теперь поговорим о термине 'Один-через-отношение'
Допустим у нас есть автомастерская: механики, автомобили, владельцы автомобилей.

Каждая модель Mechanic может быть связана только с одной моделью Car.
А каждая модель Car только с одной моделью User.
То есть Mechanic и User не имеют прямых отношений.
Вот краткая схемка:<br>
mechanics<br>
id - integer<br>
name - string

cars<br>
id - integer<br>
model - string<br>
mechanic_id - integer

owners<br>
    id - integer<br>
    name - string<br>
    car_id - integer

Но механик может получить владельца машины через сам автомобиль.
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    /**
     * Получить владельца машины.
     */
    public function carOwner()
    {
        return $this->hasOneThrough(Owner::class, Car::class);
    }
}
```
Я постоянно сам себе задаю вопросы что же делает код и простыми словами объясняю себе, так вот тут:
Механик говорит: Хочу получить информацию о ВЛАДЕЛЬЦЕ, используя информацию об АВТОМОБИЛЕ ВЛАДЕЛЬЦА.

Первый аргумент, передаваемый методу hasOneThrough – это имя последней модели, к которой мы хотим получить доступ.
Второй аргумент – это имя промежуточной (сводной) модели.

Приступаем к обсуждению термина 'многие-через-отношение'.
В Laravel приведен довольно сложный проект с проектами и environments, я приведу свой.
Допустим у нас есть родительский комитет, в котором сидят родители учеников.
РОДИТЕЛИ хотят услышать от УЧИТЕЛЕЙ информацию о том, как учатся их ДЕТИ.
```php
class Parent extends Model
{
    // Здесь я намеренно напишу не children, а childs, чтобы было наглядно понятно что это за метод. Я знаю, что нет такого слова - childs.
    public function childs()
    {
        /**
        *  РОДИТЕЛИ получают информацию о ДЕТЯХ от ПРЕПОДАВАТЕЛЕЙ
        */
        return $this->hasManyThrough(Child::class, Teacher::class);
    }
}
```

### Полиморфные отношения
Мама, я уже заебался оформлять другие модели, поэтому просто расскажу че как.
Полиморфные отношения - такие отношения, когда дочерняя модель принадлежит более чем к одному типу модели.
Например, модель Comment может относиться как к Post, так и к Video.
Вот краткая структура таблиц:<br>
posts<br>
id - integer<br>
name - string

users<br>
    id - integer<br>
    name - string

images<br>
    id - integer<br>
    url - string<br>
    imageable_id - integer<br>
    imageable_type - string

Например, у нас есть картинки у пользователей и у постов. Тогда это полиморфное отношение.
Чтобы указать полиморфное отношение, используем:
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * Получить родительскую модель (пользователя или поста), к которой относится изображение.
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}

class Post extends Model
{
    /**
     * Получить изображение поста.
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}

class User extends Model
{
    /**
     * Получить изображение пользователя.
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
```
Получение отношения:
```php
$post = Post::find(1);
$image = $post->image;
```

Можно получить родительский объект полиморфной модели, обратившись к имени метода, который возвращает morphTo.
```php
$image = Image::find(1);
$imageable = $image->imageable;
```
Отношение imageable в модели Image будет возвращать экземпляр Post или User,
в зависимости от того, к какому типу модели относится изображение.

По отношению к обычному "многие-ко-многим", полиморфное отношение тоже самое, там тоже приставка "Many"
Мне лень объяснять, сам найди и прочитай.

### Подсчет связанных моделей
```php
#[NoReturn] public function getCountOfPostsRelations()
{
    $users = User::withCount('posts')->get();
     foreach ($users as $user) {
         dd($user->post_count);
     }

    $users = User::withCount('roles')->get();
    dd($users);
    foreach ($users as $user) {
        dd($user->post_count);
    }
}
```
В данном случае переменные post_count, user_count предопределены laravel.
