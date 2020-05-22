@extends('administrador.master', ['actual' => 2])

@section('content')

    <h1> Ver Coche </h1>

    <div style= "margin-left:33%">
        <table>
            <tr height="50px">
                <td>
                    <a href="{{ action('AdministradorController@coche_modificar') }}"><i style="float:right" class="fas fa-edit">Editar</i></a>
                </td>
                <td></td>
            </tr>

            <tr>
                <td rowspan="7" width="320px" height="20px">
                    @if (isset($coche->rutaImagen))
                        <img src="/images/{{ $coche->rutaImagen }}" width="300px" height="auto">
                    @else
                        <img src="/defaultImages/defaultCoche.jpg" width="300px" height="auto">
                    @endif
                </td>
                <td>Nombre: {{ $coche->nombre }}</td>
            </tr>
         <!------------------------------------------------------------------------- 
            <tr><td>Apellido1: {{ $conductor->apellido1 }}</td></tr>
            <tr><td>Apellido2: {{ $conductor->apellido2 }}</td></tr>
            <tr><td>Genero: {{ $conductor->genero }}</td></tr>
            <tr><td>Fecha Nacimiento: {{ $conductor->fechaNacimiento }}</td></tr>
            <tr><td>Email contacto: {{ $conductor->correo}}</td></tr>
            <tr><td>Teléfono contacto: {{ $conductor->telefono }}</td></tr>
            <tr><td>Localidad: {{ $localidad }}</td></tr>
            <tr><td>Universidad: {{ $universidad }}</td></tr>
            <tr><td>Punto de Recogida: {{ $conductor->puntoRecogida }}</td></tr>-->

            <tr><td>&nbsp</td></tr>
            <tr><td>&nbsp</td></tr>
        </table>
    </div>
@endsection