<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Private Page</title>
</head>
<body>
    {{ $data->name }}
    {{ $data->email }}
    {{ $data->password }}
    <x-button-link href="{{ route('logout') }}"> {{ __('Logout') }}</x-button-link>
</body>
</html>
