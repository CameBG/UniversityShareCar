@extends('pasajero.master', ['actual' => 2])

@section('content')

    <h1> Configurar Perfil </h1>

    <div style= "margin-left:33%">
        <table>
            
            <tr height="50px">
                <td>
                    <a href="{{ action('PasajeroController@perfil_modificar') }}"><i style="float:right" class="fas fa-edit">Editar</i></a>
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

            <tr><td>&nbsp</td></tr>
            <tr><td>&nbsp</td></tr>
        </table>

        <form method="POST" action = "{{ action('PasajeroController@perfil_borrar') }}">
            @csrf
            <button style="float:left" type="submit" class="btn btn-primary"><i class="fas fa-trash-alt"></i> Borrar usuario pasajero.</button>
        </form>
    </div>
@endsection