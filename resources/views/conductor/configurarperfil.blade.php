@extends('conductor.master', ['actual' => 4])

@section('content')

    <h1> Configurar Perfil </h1>

    <div style= "margin-left:33%">
        <table>
            
            <tr height="50px">
                <td>
                    <a href="{{ action('ConductorController@perfil_modificar', ['correo'=>$conductor->correo]) }}"><i style="float:right" class="fas fa-edit">Editar</i></a>
                </td>
                <td></td>
            </tr>

            <tr>
                <td rowspan="7" width="320px" height="20px">
                    @if (isset($conductor->rutaImagen))
                        <img src="/images/{{ $conductor->rutaImagen }}" width="300px" height="auto">
                    @else
                        <img src="/images/default.jpg" width="300px" height="auto">
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

            <tr><td>&nbsp</td></tr>
            <tr><td>&nbsp</td></tr>
        </table>

        <form method="POST" action ="{{ action('ConductorController@perfil_borrar', ['correo'=>$conductor->correo]) }}">
            @csrf
            <button type="submit" class="btn btn-primary">
                <a style="color:white"><i class="fas fa-trash-alt"></i> 
                    Borrar usuario conductor.
                </a>
            </button>
        </form>
        
    </div>
@endsection