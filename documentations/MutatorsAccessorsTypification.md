### Accessor

Аксессор преобразует значение атрибута экземпляра Eloquent при обращении к нему.
ВАЖНЫЙ МОМЕНТ. Аксессор НЕ МЕНЯЕТ значение в базе данных, он лишь просто исполняет код и выводит вам формат который вы написали
(в базе ничего не меняется!). А вот Мутатор уже меняет, о нем поговорим ниже.

Для этого используется метод
```php
public function get{NameOfTheAttribute}Attribute ($value)
{
     // or
     return $this->attributes['password'] = Hash::make($password);
     // or
     return Hash::($value);
}
```

Вы не ограничены взаимодействием с одним атрибутом в вашем аксессоре. Вы также можете использовать аксессор для возврата новых вычисленных значений из существующих атрибутов:
```php
/**
 * Получить полное имя пользователя.
 *
 * @return string
 */
public function getFullNameAttribute()
{
    return "{$this->first_name} {$this->last_name}";
}
```
Важный момент, если вы хотите добавить новые элементы в представление массива/JSON вашей модели, нужно будет добавить их. Как это сделать?
Достаточно просто добавить protected свойство appends в модель и указать имя нового атрибута. При это колонки в базе данных не будет.

```php
protected $appends = ['full_name'];
```

Во время выполнения скрипта вы можете указать экземпляру модели добавить дополнительные атрибуты с помощью метода append. Или вы можете использовать метод setAppends, чтобы переопределить весь массив добавленных свойств для конкретного экземпляра модели:
```php
return $user->append('is_admin')->toArray();
return $user->setAppends(['is_admin'])->toArray();
```

### Serialization
Вы можете настроить формат сериализации по умолчанию для всех дат вашей модели, переопределив метод serializeDate вашей модели. Этот метод не влияет на форматирование дат для их сохранения в базе данных:
```php
/**
 * Подготовить дату для сериализации массива / JSON.
 *
 * @param  \DateTimeInterface  $date
 * @return string
 */
protected function serializeDate(DateTimeInterface $date)
{
    return $date->format('Y-m-d');
}
```

Не стоит путать $casts и serializeDate. $casts - преобразует дату и записывают ее в базу данных в определенном формате,
а serializeDate просто преобразует и выводит дату в нужном вам формате (в базе ничего не меняется).

### Mutator
Если аксессор - get{NameOfTheAttribute}Attribute, то мутатор - set{NameOfTheAttribute}Attribute.
Сейчас коротко и на примере, сразу поймете.
Мы говорим создать модель с полем 'имя' = 'JoHn PetterSON';

У нас есть мутатор:
```php
public function setNameAttribute($value)
{
    $this->attributes['name'] = strtolower($value);
}
```
В БАЗУ ЗАПИШЕТСЯ: john petterson.
