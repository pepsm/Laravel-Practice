<nav class="navbar navbar-expand-lg py-0">
    <div class="container">
        <!-- Logo Navbar -->
        <a class="navbar-brand" href="{{ url('/items') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <!-- Collapsed Navbar -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav mr-auto">

            </ul>
            

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item m-1">
                        <a class="nav-link btn btn-theme pl-3 pr-3 pt-1 pb-1" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item m-1">
                            <a class="nav-link btn btn-theme pl-3 pr-3 pt-1 pb-1" href="{{ route('register') }}">{{ __('Sign-up') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <div class="dropdown-close-tag">
                            <a id="navbarDropdown" class="nav-link btn-theme dropdown-toggle m-1 py-1 btn shadow-none" href="#" role="button" aria-pressed="false" autocomplete="off" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
                                <i class="fas fa-user pt-1 pr-2"></i>{{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right theme mb-1" aria-labelledby="navbarDropdown">

                                <h3 class="dropdown-header theme">View options</h3>

                                <div class="theme-container">
                                    <i class="icon-mode fas pt-1 pr-2"></i>
                                    <span class="text-mode">Light Mode</span>
                                    <input class="tgl tgl-light" type="checkbox" id="switch-theme" name="theme" />
                                    <label class="tgl-btn" for="switch-theme"></label>
                                </div>

                                <div class="dropdown-divider theme"></div>
                                <h3 class="dropdown-header theme">More stuff</h3>

                               
                                <a class="dropdown-item theme" href="{{ url('/account') }}"><i class="fas fa-user pt-1 pr-2"></i>Account</a>                               

                                
                                <a class="dropdown-item theme" href="{{ url('/dashboard') }}"><i class="fas fa-compact-disc pt-1 pr-2"></i>Dashboard</a>
                               

                                <div class="dropdown-divider theme"></div>
                               
                                <a class="dropdown-item theme" href="{{ url('/about') }}"><i class="fas fa-question-circle pt-1 pr-2"></i>About</a>
                               

                                <a class="dropdown-item theme" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-in-alt pt-1 pr-2"></i>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/items') }}"><i class="fa fa-camera-retro pt-1 pr-2"></i></a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
