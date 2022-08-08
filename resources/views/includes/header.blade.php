<header class="py-3 border-bottom">
    <div class="container">

        <div class="d-flex justify-content-between">
            <div>
                <ul class="list-unstyled d-flex">
                    <li class="me-3">
                        <a href="{{ route('home') }}">
                            {{ config('app.name') }}
                        </a>
                    </li>

                    <li class="me-3">
                        <a href="{{ route('blog') }}">
                            Blog
                        </a>
                    </li>
                </ul>
            </div>

            <ul class="list-unstyled d-flex">
                <li class="ms-3">
                    <a href="{{ route('register') }}">
                        Registration
                    </a>
                </li>

                <li class="ms-3">
                    <a href="{{ route('login') }}">
                        Login
                    </a>
                </li>
            </ul>
        </div>
</header>
