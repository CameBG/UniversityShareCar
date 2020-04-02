<!DOCTYPE html>
<html lang="en" dit="ltr">

    <head>
        <meta charset="utf-8">
        <title>UniversityCar</title>
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    </head>

    <body>
       
        
        <div class="sidebar">
            <header>UniversityCar</header>
            <ul>
                <li><a href="mishorarios"><i class="fas fa-calendar-week"></i> Mis horarios</a></li>
                <li><a href="coches"><i class="fas fa-car"></i> Coches</a></li>
                <li><a href="ruta"><i class="fas fa-route"></i> Ruta</a></li>
                <li><a href="pasajeros"><i class="fas fa-user"></i> Pasajeros</a></li>
                <li><a href="configurarperfil"><i class="fas fa-cog"></i> Configurar perfil</a></li>
                <li><a href=""><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
            </ul>
        </div>
        <div id="contenido"> 
            @yield('content')
        </div>
        
       
    </body>
</html>