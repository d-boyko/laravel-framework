<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin page</title>
</head>
<body>

<div>
    <h1>
        Admin functions
    </h1>
</div>

<x-button href="{{ route('csv-users-export') }}">
    {{ __('Export Users table') }}
</x-button>

<br>

<x-button href="{{ route('csv-posts-export') }}">
    {{ __('Export Posts table') }}
</x-button>

</body>
</html>
