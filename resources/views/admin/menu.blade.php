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

<ul class="navbar-nav">

    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('csv-users-export') }}">{{ __('Export Users table') }}</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('csv-posts-export') }}" tabindex="-1" aria-disabled="true">{{ __('Export Posts table') }}</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.update-user') }}" tabindex="-1" aria-disabled="true">{{ __('Update user information') }}</a>
    </li>
</ul>

</body>
</html>
