### EloquentQueryBuilder

Чтобы получить все записи таблички, связанной с моделью:
```php
$users = User::all();
    foreach($users as $user) {
    echo $user->name;
}
```

Также можно получать записи с дополнительными условиями:
```php
$users = User::where('name', '=', 'John')
    ->orderBy('id')
    ->take(10)
    ->get()
;
```
Здесь<br>
WHERE - аналог WHERE в sql<br>
TAKE - аналог LIMIT<br>
GET - получение результатов

Метод refresh повторно обновит модель, используя свежие данные из БД:
```php
$flight = Flight::where('number', 'FR 900')->first();
$flight->number = 'FR 456';
$flight->refresh();
$flight->number; // "FR 900"
```

Методы all и get возвращают не массив, а экземпляр класса Collection, который содержит много полезных методов.

Отображение записей, используя chunks, меньшее потребление памяти при работе с большим количеством моделей
```php
User::chunk(200, function($users) {
    foreach($users as $user)
        echo $user->name;
});
```

Обновление, используя chunks, сортировка по Id
```php
User::where('is_active', '=', true)
    ->chunkById(200, function ($users)) {
        $users->each->update(['is_admin' => true]);
    }, $column = 'id')
```

Метод lazy работает концептуально как chunks, только с lazy вы работаете с единым потом, а chunks берет каждую модель отдельно
lazy возвращает экземпляр класса LazyCollection одноуровневых моделей Eloquent
```php
foreach(User::lazy() as $user) {
    // some code here
}
```

Обновление, используя lazy, сортировка по Id
```php
User::where('is_active', '=', true)
    ->lazyById(200, function ($users)) {
        $users->each->update(['is_admin' => true]);
    }, $column = 'id')
```

Либо можно отфильтровать результаты по убыванию Id:
```php
User::where('is_active', '=', true)
    ->lazyByIdDesc(200, function ($users)) {
        $users->each->update(['is_admin' => true]);
    }, $column = 'id')
```

Отображение результатов с помощью курсора:
```php
$users = User::cursor()->filter(function ($user) {
    return $user->id > 500;
});

foreach ($users as $user) {
    echo $user->id;
}
```

### Расширенные подзапросы
Eloquent также предлагает поддержку расширенных подзапросов, которая позволяет извлекать информацию из связанных таблиц в одном запросе.
Долго не мог понять как вывести это в обычный SQL-запрос, а потом просто нашел метод ->toSql()...
```php
Destination::addSelect(['last_flight' => Flight::select('name')
    ->whereColumn('destination_id', 'destinations.id')
    ->orderByDesc('arrived_at')
    ->limit(1)
```

```sql
select `users`.*,
       (
        select
            `is_published`
        from
            `posts`
        ) as `is_published`
from `users`
where `posts`.`user_id` = `users`.`id`
  and `users`.`deleted_at` is null
order by `email` desc
limit 1
```

Кроме того, метод orderBy построителя запросов поддерживает подзапросы:
```php
User::orderByDesc(
    Post::select('is_published')
        ->whereColumn('user_id', 'users.id')
        ->orderByDesc('is_published')
        ->limit(1)
)
```
```sql
select
    *
from
    `users`
where
    `users`.`deleted_at` is null
order by
(
    select
        `is_published`
    from
        `posts`
    where
        `user_id` = `users`.`id`
    order by
        `is_published` desc
    limit 1
) desc
```

Хотя метод cursor использует гораздо меньше памяти, чем обычный запрос (удерживая в памяти только одну модель Eloquent),
он все равно в конечном итоге может исчерпать память.
Если нужно работать с большим количеством записей - то используете lazy.

```php
get() ->
```
Работает быстро, но жрет много памяти, под капотом использует fetchAll, загружаю сразу все.

```php
cursor() ->
```
Работает медленно, но жрет мало памяти, под капотом использует fetch. Итерации выполняются одна за другой;<br>
Не загружает отношения;<br>
Не может работать с большими коллекциями, закончится память;<br>
Так как загрузка данных происходит только по одной записи за раз, это позволит сохранить согласованность при обработке наборов данных,
которые могут измениться в процессе работы;<br>
Модели не будут включены, пока не будут фактически итерированы.<br>
```php
chunk() ->
```
Меньше вызовов fetchAll, пытается разбить большой результат на маленькие, используя предел указанный тобой;
В каком-то смысле chunk использует преимущества get() и cursor();
Наименьшее использование памяти;
Самый медленный способ;
Если одновременно выполняем итерацию и обновляем данные, используй chunkById;
Могут возникнуть проблемы при обновлении первичных и внешних ключей.
<br>
```php
lazy() ->
```
По сути, она делает то же самое, что и chunk(). Однако вам не нужен обратный вызов,
поскольку он использует PHP-генераторы и возвращает LazyCollection, что делает синтаксис более чистым;
Низкое использование памяти;<br>
Более приятный синтаксис, чем chunk();<br>
Если вы одновременно выполняете итерацию и обновление записей, используйте lazyById.<br>

### Извлечение отдельных моделей

Получить модель по первичному ключу:
```php
$user = User::find(1);
```

Получить первую модель, соответствующую условиям запроса:
```php
$user = User::where('is_active', true)->first();
```

Тот же запрос, но другим способом:
```php
$user = User::firstWhere('is_active', true);
```

Найти первый результат, а если не найден - то сделать определенные действия
```php
$model = User::where('name', '=', 'Daniil Boyko')->firstOr(function() {
    echo 'Ok, ok, here we go again...';
});
```

Выбросить исключение при отсутствии результатов запроса:
```php
$user = User::findOrFail(1);
$user = User::where('name', '=', 'Daniil Boyko')->firstOrFail();
```

Если исключение не перехвачено, то клиенту автоматически отправляется HTTP-ответ 404:
```php
Route::get('/api/flights/{id}', function ($id) {
    return Flight::findOrFail($id);
});
```

Получить рейс по `name` или создать его, если его не существует:
```php
$flight = Flight::firstOrCreate([
    'name' => 'London to Paris'
]);
```

Получить рейс по `name` или создать его с атрибутами `name`,` delayed` и `arrival_time`:
```php
$flight = Flight::firstOrCreate(
    ['name' => 'London to Paris'],
    ['delayed' => 1, 'arrival_time' => '11:30']
);
```

Получить рейс по `name` или создать новый экземпляр Flight:
```php
$flight = Flight::firstOrNew([
    'name' => 'London to Paris'
]);
```

Получить рейс по `name` или создать экземпляр с атрибутами `name`, `delayed` и `arrival_time`:
```php
$flight = Flight::firstOrNew(
    ['name' => 'Tokyo to Sydney'],
    ['delayed' => 1, 'arrival_time' => '11:30']
);
```

### Извлечение агрегатов
Количество записей по условию:
```php
$count = Flight::where('active', 1)->count();
```

Максимальное значение по условию:
```php
$max = Flight::where('active', 1)->max('price');
```

Другие агрегатные функции:
https://laravel.su/docs/8.x/queries#aggregates

### Создание моделей
Мы возвращаемся к контроллерам, потому что писать в рутах в callback функции какую-то логику - это кринж.
```php
class UserController
{
    public function store()
    {
        $user = new User();
    }
}
```
Можно так
```php
$user->name = $request->name;
```
А можно так
```php
$user->name = $request->input('name');
```
```php
$user->save();
```
Когда мы сейвим эту запись, поля created_at и update_at будут заполнены автоматически

Также создавать модели можно и другим способом:
```php
$user = User::create([
    'name' => 'Daniil Boyko',
]);
```
Но тогда перед использованием метода create нужно указать в классе модели такие свойства как fillable и guarded.
* Поля которые могут быть заполнены вручную.
```php
protected $fillable = [
    'name',
    'email',
    'password',
];
```

* Поля которые защищены от ручной вставки.
```php
protected $hidden = [
    'password',
    'remember_token',
];
```

Мы также можем добавить 2 условия в where, когда ищем записи:
```php
$user = User::where('is_active', true)
    ->where('name', '=', 'Daniil Boyko')
    ->update(['is_admin' => true])
;
```
Метод update ожидает массив пар ключей и значений, представляющих столбцы, которые должны быть обновлены.

### Грязные/чистые модели
Метод isDirty определяет была ли изменена модель в текущем состоянии.
isClean делает точно наоборот.
Оба этих методов можно применять не ко всей модели в целом, а только к полю.
```php
$user = User::create([
    'first_name' => 'Taylor',
    'last_name' => 'Otwell',
    'title' => 'Developer',
]);

$user->title = 'Painter';

$user->isDirty(); // true
$user->isDirty('title'); // true
$user->isDirty('first_name'); // false

$user->isClean(); // false
$user->isClean('title'); // false
$user->isClean('first_name'); // true

$user->save();

$user->isDirty(); // false
$user->isClean(); // true
```

По названию метода wasChanged наверно понятно, какой результат она выдаст и при каком условии.<br>
Вот пример кода:
```php
$user = User::create([
'first_name' => 'Taylor',
'last_name' => 'Otwell',
'title' => 'Developer',
]);

$user->title = 'Painter';

$user->save();

$user->wasChanged(); // true
$user->wasChanged('title'); // true
$user->wasChanged('first_name'); // false
```

По названию метода getOriginal должно быть понятно, что происходит:<br>
Вот пример кода:
```php
$user = User::find(1);

$user->name; // Daniil
$user->email; // email@example.com

$user->name = "Jack";
$user->name; // Jack

$user->getOriginal('name'); // Daniil
$user->getOriginal(); // Массив исходных атрибутов ...
```
Метод обновления-вставки:
В приведенном ниже примере, если существует рейс с пунктом отправления «Oakland» и пунктом назначения «San-Diego»,
его столбцы price и discounted будут обновлены. Если такой рейс не существует, то будет создан новый рейс с атрибутами,
полученными в результате слияния первого массива аргументов со вторым массивом аргументов.
```php
$flight = Flight::updateOrCreate(
    ['departure' => 'Oakland', 'destination' => 'San Diego'],
    ['price' => 99, 'discounted' => 1]
);
```

Тут уже пошло совсем извращенство:
Если вы хотите выполнить несколько «обновлений-вставок» в одном запросе, вам следует использовать вместо этого метод upsert.
Первый аргумент метода состоит из значений для вставки или обновления, а второй аргумент перечисляет столбцы,
которые однозначно идентифицируют записи в связанной таблице.
Третий и последний аргументы метода – это массив столбцов, которые следует обновить, если соответствующая запись уже существует в БД.
Метод upsert автоматически устанавливает временные метки created_at и updated_at, если они разрешены в модели:
```php
Flight::upsert([
    ['departure' => 'Oakland', 'destination' => 'San Diego', 'price' => 99],
    ['departure' => 'Chicago', 'destination' => 'New York', 'price' => 150]
], ['departure', 'destination'], ['price']);
```
### Удаление моделей

```php
$user = User::find(1);
$user->delete();
```

Можно удалить все модели
```php
User::truncate();
```

Удаление модели по ID:
```php
Flight::destroy(1);
Flight::destroy(1, 2, 3);
Flight::destroy([1, 2, 3]);
Flight::destroy(collect([1, 2, 3]));
```

Удаление по условию:
```php
$deletedRows = Flight::where('active', 0)->delete();
```

Теперь о том, что такое softDelete;
Надо написать миграцию в табличку со строкой
```php
Schema::table('flights', function (Blueprint $table) {
    $table->softDeletes();
});
```
и в классе модели написать use SoftDeletes;

Это добавляет колонку deleted_at.
Теперь если вы будете удалять какую-то строку из таблички, по сути она удаляться не будет, но в поле deleted_at появится timestamp удаления.
Соответственно если мы в дальнейшем будем писать select на табличку - эти записи не будут показываться в результате запроса.
Чтобы восстановить какую-то softDelete запись, то указываем:
```php
$user->restore()
```
Либо
```php
App\Models\Flight::withTrashed()
    ->where('airline_id', 1)
    ->restore()
;
```

Чтобы полностью удалить запись из таблички, которая имеет softDelete, указываем:
```php
$user->forceDelete();
```

Метод onlyTrashed покажет только программно удаленные записи:
```php
$flights = Flight::onlyTrashed()
    ->where('airline_id', 1)
    ->get()
;
```
