<!DOCTYPE html>

<html lang="en" dit="ltr">
    <head>
        <meta charset="utf-8">
        <title>UniversityCar</title>
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="sidebar">
            <header>UniversityCar</header>
            <ul>
                <li>
                    <a href="{{ action('AdministradorController@pasajeros') }}" @if(($actual ?? -1) === 0) style="background:royalblue" @endif>
                        <i class="fas fa-user"></i> 
                        Pasajeros
                    </a>
                </li>
                <li>
                    <a href="{{ action('AdministradorController@conductores') }}" @if(($actual ?? -1) === 1) style="background:royalblue" @endif >
                        <i class="fas fa-user"></i>
                        Conductores    
                    </a>
                </li>
                <li>
                    <a href="{{ action('AdministradorController@users') }}" @if(($actual ?? -1) === 2) style="background:royalblue" @endif>
                        <i class="fas fa-user"></i>
                        Users
                    </a>
                </li>
                
                <li>
                    <a href="{{ action('AdministradorController@rutas') }}" @if(($actual ?? -1) === 3) style="background:royalblue" @endif>
                        <i class="fas fa-route"></i> 
                        Rutas
                    </a>
                </li>
                <li>
                    <a href="{{ action('AdministradorController@slots') }}" @if(($actual ?? -1) === 4) style="background:royalblue" @endif>
                        <i class="fas fa-calendar-week"></i>
                            Slots
                        </a>
                    </li>
                <li>
                <li>
                    <a href="{{ action('AdministradorController@lineaslots') }}" @if(($actual ?? -1) === 5) style="background:royalblue" @endif>
                        <i class="fas fa-calendar-week"></i>
                            LineaSlots
                        </a>
                </li>
                <li>
                    <a href="{{ action('AdministradorController@coches') }}" @if(($actual ?? -1) === 6) style="background:royalblue" @endif>
                        <i class="fas fa-car"></i>
                        Coches
                    </a>
                </li>
                <li>
                    <a href="{{ url('/index') }}" @if(($actual ?? -1) === 7) style="background:royalblue" @endif>
                        <i class = "fas fa-cat"></i> Elegir usuario
                    </a>
                </li>
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                    <a class="profile-submenu" @if(($actual ?? -1) === 8) style="background:royalblue" @endif href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                        <i class="fas fa-sign-out-alt"></i> Cerrar sesión 
                    </a>
                </li>
            </ul>
        </div>
        <div id="contenido"> 
            @yield('content')
        </div>
    </body>
</html>