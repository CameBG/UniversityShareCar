@extends('administrador.master', ['actual' => 1])

@section('content')

<div class="col-md-11">
    <div class="card w-100 my-4 mx-5">
        <div class="card-header">
            <h1 style="text-align:center; display:inline-block"> Ver Conductor </h1>

            <div class="card-body">
                <table class = 'table table-striped'>
                    <tr align="center">
                        <td>
                            <a href="{{ action('AdministradorController@conductor_modificar', ['correo'=>$conductor->correo, 'localidad'=>$localidad, 'universidad'=>$universidad]) }}"><i style="float:right" class="fas fa-edit">Editar</i></a>
                        </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td rowspan="7" width="320px" height="20px">
                            @if (isset($conductor->rutaImagen))
                                <img src="/images/{{ $conductor->rutaImagen }}" width="300px" height="auto">
                            @else
                                <img src="/defaultImages/defaultPerfil.jpg" width="300px" height="auto">
                            @endif
                        </td>
                        <td>Nombre: {{ $conductor->nombre }}</td>
                    </tr>
                    
                    <tr><td>Apellido1: {{ $conductor->apellido1 }}</td></tr>
                    <tr><td>Apellido2: {{ $conductor->apellido2 }}</td></tr>
                    <tr><td>Genero: {{ $conductor->genero }}</td></tr>
                    <tr><td>Fecha Nacimiento: {{ $conductor->fechaNacimiento }}</td></tr>
                    <tr><td>Email contacto: {{ $conductor->correo}}</td></tr>
                    <tr><td>Teléfono contacto: {{ $conductor->telefono }}</td></tr>
                    <tr><td>Localidad: {{ $localidad }}</td></tr>
                    <tr><td>Universidad: {{ $universidad }}</td></tr>
                    <tr><td>Punto de Recogida: {{ $conductor->puntoRecogida }}</td></tr>

                </table>
            </div>
@endsection