<nav @if(Request::is('/*')) class="navbar navbar-expand-md navbar-dark fixed-top nav-margin" @else class="navbar navbar-expand-md navbar-dark fixed-top nav-margin" @endif>
    @if(!Request::is('/*'))
    <div class="container">
    @endif
    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Stopover') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        {{-- Left Side Of Navbar --}}
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
            <a class="nav-link" href="/"></a>
            </li>
        </ul>

        {{-- Right Side Of Navbar --}}
        <ul class="navbar-nav ml-notAuto">
            {{-- Authentication Links --}}
            @if(Auth::guest())
            {{session(['link' => url()->previous()])}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </li> --}}
                @if(!Request::is('login') && !Request::is('register'))
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <div class="input-group">
                                <input id="email" type="text" class="form-control form-control-sm" name="email" placeholder="Username or e-mail" required autofocus>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="input-group">
                                <input id="password" type="password" class="home-login form-control form-control-sm text-white" name="password" placeholder="Password" style="background-color: rgba(0,0,0,0) !important" required>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="input-group">
                                <button type="submit" class="btn btn-sm btn-outline-light fas fa-arrow-alt-circle-right navbar-submit"></button>
                            </div>
                        </div>
                        <a class="nav-item nav-link mr-1" href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                    </div>
                </form>
                @endif
            @else
                <li class="nav-item dropdown ml-notAuto">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->username }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right mt-2" aria-labelledby="navbarDropdown">
                        @if(!Auth::guest() && Auth::user()->hasRole('hotel'))
                        <a class="dropdown-item" href="/hotels/{{App\Hotel::getHotelId(Auth::user()->id)}}">Profile</a>
                        @endif
                        <a class="dropdown-item" href="/dashboard">Dashboard</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endif
        </ul>
    </div>
    @if(!Request::is('/*'))
    </div>
    @endif
</nav>

<script>
    $(window).scroll(function(){
        $('nav').toggleClass('primaryColor', $(this).scrollTop() > 25);
    });
</script>