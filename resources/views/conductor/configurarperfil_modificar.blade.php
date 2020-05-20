@extends('conductor.master')

@section('content')

    <h1> Configurar Perfil </h1>

    <div style= "margin-left:33%">
        <form method="POST" action = "{{ action('ConductorController@perfil_modificado', ['correo'=>$conductor->correo]) }}" enctype="multipart/form-data">
        @csrf
            <table>
                <tr>
                    <td rowspan="7" width="320px" height="20px">
                        @if (true)
                            <img src="/images/{{ $conductor->rutaImagen }}" width="300px" height="auto">
                        @else
                            <img src="/images/default.jpg" width="300px" height="auto">
                        @endif
                    </td>
                    <td>
                        <label style="float:left" for="nombre" >Nombre: &nbsp&nbsp</label>
                        <input style="float:left" type="text" name="nombre" id="nombre" value="{{ $conductor->nombre }}"/>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label style="float:left" for="apellido1" >Apellido 1: &nbsp&nbsp</label>
                        <input style="float:left" type="text" name="apellido1" id="apellido1" value="{{ $conductor->apellido1 }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="float:left" for="apellido2" >Apellido 2: &nbsp&nbsp</label>
                        <input style="float:left" type="text" name="apellido2" id="apellido2" value="{{ $conductor->apellido2 }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="float:left" for="genero" >Genero: &nbsp&nbsp</label>
                        <input style="float:left" type="text" name="genero" id="genero" value="{{ $conductor->genero }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="float:left" for="fechaNacimiento" >Fecha nacimiento: &nbsp&nbsp</label>
                        <input style="float:left" type="text" name="fechaNacimiento" id="fechaNacimiento" value="{{ $conductor->fechaNacimiento }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="float:left" for="correo" >Correo: {{ $conductor->correo }}</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="float:left" for="telefono" >Teléfono de contacto: &nbsp&nbsp</label>
                        <input style="float:left" type="text" name="telefono" id="telefono" value="{{ $conductor->telefono }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        Editar imagen:
                        <input name="imagen" id="imagen" type="file" accept="image/jpeg, image/png"/>
                    </td>
                </tr>
            </table>

            <br>

            <button type="submit" class="btn btn-primary"><i class="fas fa-check-square"></i>&nbsp Aceptar cambios.</button>
        </form>

        {{--Error messages--}}
        @if (count($errors) > 0)
            <div style="float:left" class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
    </div>
@endsection