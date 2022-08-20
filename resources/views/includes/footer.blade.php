<nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Bottom navigation panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Переключить навигацию">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Main page</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.list') }}"></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}" tabindex="-1" aria-disabled="true">Registration</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}" tabindex="-1" aria-disabled="true">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.posts') }}" tabindex="-1" aria-disabled="true">{{ __('Posts') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.list') }}" tabindex="-1" aria-disabled="true">{{ __('Users') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
