### Collections

Класс Illuminate\Support\Collection обеспечивает гибкую и удобную обертку для работы с массивами данных.
Можно использовать хелпер 'collect'.
Как я сказал выше, помощник (хелпер) collect всегда возвращает экземпляр Collection для переданного массива.
```php
$collection = collect([1,2,3]);
```

### Методы коллекций
Здесь мы будем использовать хелпер collect, чтобы создать новый экземпляр коллекции из массива,
запустим функцию strtoupper для каждого элемента, а затем удалим все пустые элементы:
```php
$collection = collect(['taylor', 'abigail', null])->map(function ($name) {
    return strtoupper($name);
})->reject(function ($name) {
    return empty($name);
});
```
Collection позволяет объединять необходимые вам методы в цепочку для выполнения последовательного перебора
и сокращения базового массива. Каждый метод коллекции возвращает совершенно новый экземпляр Collection.
```php
Collection::macro('toUpper', function() {
    return $this->map(function ($value) {
        return Str::upper($value);
    });
});
```

```php
$collection = collect(['first', 'second']);
$collection->toUpper();
```

Все методы Eloquent, которые возвращают более одной модели - возвращают экземпляры класса:
Illuminate\Database\Eloquent\Collection, включая результаты, полученные с помощью метода get или доступные через отношения.
```php
$result = [];

$eloquentCollection = User::withTrashed()->get();
$collection = collect($eloquentCollection->toArray());

$result['first'] = $collection->first();
$result['last'] = $collection->last();
$result['where']['data'] = $collection
    ->where('name', '=', 'Adonis Herzog') // where condition
    ->values() // get only values from collection
    ->keyBy('id'); // the key will be equal to id from collection

$result['where']['count'] = $result['where']['data']
    ->count(); // Количество элементов коллекции

$result['where']['isEmpty'] = $result['where']['data']
    ->isEmpty(); // коллекция пуста?

$result['where']['isNotEmpty'] = $result['where']['data']
    ->isNotEmpty(); // коллекция не пуста?

$result['where']['first'] = $collection
    ->firstWhere('created_at', '>', '2022-09-01 01:15:58'); // взять первое значение из коллекции с условием

Базовое значение не изменится, но новое значение вернется
$result['map'] = $collection->map(function (array $element) {
    return [$element['name'], $element['email']];
}); // re-mapping some collection


$defaultCollection = collect(User::all()->toArray());

$defaultCollection->transform(function (array $item) {
   return [
       'id' => $item['id'],
       'name' => $item['name'],
       'email' => $item['email'],
       'created_at' => $item['created_at']
   ];
});
```

    Вместо метода orWhere, потому что
```php
$filteredCollection = $defaultCollection->filter(function ($item) {
    return
        ($item['email'] == 'abagail.conroy@example.com') ||
        ($item['email'] == 'xmurray@example.net');
})->keyBy('id');
```

    Разделение коллекции на chunks
```php
$chunkedCollection = collect([1,2,3,4,5,6,7,8,9,10]);
$chunks = $chunkedCollection->chunk(4);
dd($filteredCollection, $chunks, $chunks[0], $chunks[0][2]);
```
