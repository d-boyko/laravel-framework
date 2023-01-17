### RequestLifeCycle    

1. Файл index.php загружает автозагрузчик, созданный менеджером пакетов Composer,
    а затем извлекает экземпляр приложения Laravel из bootstrap/app.php.

2. Затем входящий запрос отправляется либо HTTP-ядру, либо Console-ядру, в зависимости от типа запроса, поступающего в приложение.
   Эти два ядра служат центральным местом, через которое проходят все запросы.

3. HTTP-ядро расширяет класс Illuminate\Foundation\Http\Kernel, который определяет массив загрузчиков (bootstrappers),
   запускающихся до выполнения запроса. Эти загрузчики настраивают обработку ошибок, логирование, определяют среду приложения
   и выполняют другие задачи, которые необходимо выполнить до фактической обработки запроса.
   Обычно эти классы обращаются ко внутренней конфигурации Laravel.
   Ядро HTTP также определяет список HTTP-посредников (миддлвейры), через которые должны пройти все запросы,
   прежде чем они будут обработаны приложением. Эти посредники обрабатывают чтение и запись HTTP-сессий, определяют,
   находится ли приложение в режиме обслуживания, проверяют токен CSRF и многое другое. Мы поговорим об этом позже.

4. Поставщики служб несут ответственность за загрузку всевозможных компонентов инфраструктуры, таких как компоненты БД,
   очереди, валидации и маршрутизации. По сути, каждая основная функция Laravel загружается и настраивается поставщиком служб.
   Поскольку они запускают и настраивают много функций, предлагаемых фреймворком.”
   Поставщики служб являются наиболее важным аспектом всего процесса начальной загрузки Laravel.

5. Когда метод маршрута или контроллера вернет ответ, тогда ответ отправится обратно через посредников маршрута,
   обеспечивая приложению возможность изменения или проверки исходящего ответа.
   Наконец, как только ответ проходит через посредников, метод handle ядра HTTP возвращает объект ответа,
   а файл index.php вызывает метод send для возвращенного ответа. Метод send отправляет содержимое ответа в веб-браузер пользователя.
   Мы завершили наш путь через весь жизненный цикл запроса Laravel!