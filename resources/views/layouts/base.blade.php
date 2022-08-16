<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('page.title', config('app.name'))</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <style>
        .container { max-width:720px; margin: 0 auto}
        .required:before { content: '*'; color: red; }
    </style>
</head>
<body>
<div class="d-flex flex-column justify-content-between min-vh-100">
    @include('includes.header')
    <main class="flex-grow-1 py-3" >
        @yield('content')
    </main>
    @include('includes.footer')
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js"></script>
@stack('js')
@stack('css')
</body>
</html>
