<nav class="navbar navbar-expand-md bg-light">
    <div class="container">
        <a href=" {{ route('home') }}" class="navbar-brand">
            {{ config('app.name') }}
        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ \Illuminate\Support\Facades\Route::is('home') ? 'active' : '' }}" aria-current="page">
                        {{ __('Main Page') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('blog') }}" class="nav-link {{ \Illuminate\Support\Facades\Route::is('blog') ? 'active' : '' }}" aria-current="page">
                        {{ __('Blogs') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('user.posts') }}" class="nav-link {{ \Illuminate\Support\Facades\Route::is('user.posts') ? 'active' : '' }}" aria-current="page">
                        {{ __('Posts') }}
                    </a>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link {{ \Illuminate\Support\Facades\Route::is('login') ? 'active' : '' }}" aria-current="page">
                        {{ __('Login') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link {{ \Illuminate\Support\Facades\Route::is('register') ? 'active' : '' }}" aria-current="page">
                        {{ __('Registration') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('user.list') }}" class="nav-link {{ \Illuminate\Support\Facades\Route::is('user.list') ? 'active' : '' }}" aria-current="page">
                        {{ __('Users') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
