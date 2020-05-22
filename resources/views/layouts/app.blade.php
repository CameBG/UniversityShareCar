<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Laravel') }}</title>-->

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <title>UniversityCar</title>
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="app">
        <div class="sidebar">
            <header>UniversityCar</header>
            <ul>
                <li>
                    <a href="{{ url('/') }}" @if(($actual ?? -1) === 0) style="background:royalblue" @endif>
                    <i class = "fas fa-home"></i> Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('sobreProyecto') }}" @if(($actual ?? -1) === 1) style="background:royalblue" @endif> 
                    <i class = "fas fa-info"></i> Sobre la web
                    </a>
                </li>
                <li>
                    <a href="{{ route('contactanos') }}" @if(($actual ?? -1) === 2) style="background:royalblue" @endif>
                    <i class = "far fa-address-book"></i> Contáctanos
                    </a>
                </li>
                @guest
                    <li>
                        <a  href="{{ route('login') }}" @if(($actual ?? -1) === 3) style="background:royalblue" @endif>
                        <i class = "fas fa-sign-in-alt"></i> {{ __('Login') }}
                        </a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}" @if(($actual ?? -1) === 4) style="background:royalblue" @endif >
                            <i class = "fas fa-user"></i> {{ __('Register') }} 
                            </a>
                        </li>
                    @endif
                @else
                    <li>
                        <a href="{{ url('/index') }}" @if(($actual ?? -1) === 5) style="background:royalblue" @endif>
                        <i class = "fas fa-cat"></i> Elegir usuario
                        </a>
                    </li>
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                        <a class="profile-submenu" @if(($actual ?? -1) === 6) style="background:royalblue" @endif href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                            <i class="fas fa-sign-out-alt"></i> Cerrar sesión 
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
        <div id="contenido"> 
            @yield('content')
        </div>
    </div>
</body>
</html>
