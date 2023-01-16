### Artisan console
Artisan - интерфейс командной строки, входящий в состав Laravel.
Для просмотра всех действующих команд:
```shell
php artisan list
```

Каждая команда включает в себя экран "справки", где отображены документы и параметры команды. Используем:
```shell
php artisan help migrate
```

Laravel Tinker - мощный REPL для фреймворка Laravel. Что такое REPL? Read, Eval, Print, Loop.
Он и так установлен в Laravel по умолчанию, но если мало ли он удален:
Чтобы установить Tinker:
```shell
composer require laravel/tinker
```

Теперь поговорим о том как этим пользоваться. Чтобы запустить:
```shell
php artisan tinker
```

Честно, я не особо пользовался Laravel Tinker, но возможно это удобный инструмент для начала разработки проекта.

Конфигурационный файл tinker может быть опубликован командой:
```shell
php artisan vendor:publish --provider="Laravel\Tinker\TinkerServiceProvider"
```
