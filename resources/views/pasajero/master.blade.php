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
                <li><a href="#"><i class="fas fa-search"></i></i> Buscar viajes</a></li>
                <li><a href="{{ action('PasajeroController@misReservas') }}"><i class="fas fa-calendar-week"></i> Mis reservas</a></li>
                <li><a href="{{ action('PasajeroController@confperfil') }}"><i class="fas fa-cog"></i> Configurar perfil</a></li>
                <li><a href="#"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
            </ul>
        </div>
        <div id="contenido"> 
            @yield('content')
        </div>
    </body>
</html>