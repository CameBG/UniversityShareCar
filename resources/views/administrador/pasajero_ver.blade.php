@extends('administrador.master', ['actual' => 0])

@section('content')

<div class="col-md-11">
    <div class="card w-100 my-4 mx-5">
        <div class="card-header">
            <h1 style="text-align:center; display:inline-block"> Ver pasajero </h1>

            <div class="card-body">
                <table class = 'table table-striped'>
                    
                    <tr align="center">
                        <td>
                            <a href="{{ action('AdministradorController@pasajero_modificar', ['correo'=>$pasajero->correo]) }}"><i style="float:right" class="fas fa-edit">Editar</i></a>
                        </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td rowspan="7" width="320px" height="20px">
                            @if (isset($pasajero->rutaImagen))
                                <img src="/images/{{ $pasajero->rutaImagen }}" width="300px" height="auto">
                            @else
                                <img src="/defaultImages/defaultPerfil.jpg" width="300px" height="auto">
                            @endif
                        </td>
                        <td>Nombre: {{ $pasajero->nombre }}</td>
                    </tr>
                    
                    <tr><td>Apellido1: {{ $pasajero->apellido1 }}</td></tr>
                    <tr><td>Apellido2: {{ $pasajero->apellido2 }}</td></tr>
                    <tr><td>Genero: {{ $pasajero->genero }}</td></tr>
                    <tr><td>Fecha Nacimiento: {{ $pasajero->fechaNacimiento }}</td></tr>
                    <tr><td>Email contacto: {{ $pasajero->correo}}</td></tr>
                    <tr><td>Teléfono contacto: {{ $pasajero->telefono }}</td></tr>
                </table>
            </div>
@endsection