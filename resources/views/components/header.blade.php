<header>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <h1>{{ env('APP_NAME') }}</h1>
            </div>
            <div class="col-xs-12 col-md-8">
                <nav class="navbar">
                    <ul>
                        <a href="{{ is_null(Auth::user()) ? route('login') : route('admin.logout') }}"><li class="btn btn-primary">{{ is_null(Auth::user()) ? 'Login' : 'Logout' }}</li></a>
                        @if (!Auth::check())
                            <a href="{{ route('admin.registration.show') }}"><li class="btn btn-primary">Registration</li></a>
                        @endif
                        @if (Auth::check())
                            <li><h2>{{ Auth::user()->username }}</h2></li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>