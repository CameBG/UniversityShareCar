@extends('pasajero.master', ['actual' => 2])

@section('content')

    <h1> Configurar Perfil </h1>

    <div style= "margin-left:33%">
        <form method="POST" action = "{{ action('PasajeroController@perfil_modificado', ['correo'=>$pasajero->correo]) }}" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td rowspan="7" width="320px" height="20px">
                        @if (isset($pasajero->rutaImagen))
                            <img src="/images/{{ $pasajero->rutaImagen }}" width="300px" height="auto">
                        @else
                            <img src="/images/defaultPerfil.jpg" width="300px" height="auto">
                        @endif
                    </td>
                    <td>
                        <label style="float:left" for="nombre" >Nombre: &nbsp&nbsp</label>
                        <input style="float:left" type="text" name="nombre" id="nombre" value="{{ $pasajero->nombre }}"/>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label style="float:left" for="apellido1" >Apellido 1: &nbsp&nbsp</label>
                        <input style="float:left" type="text" name="apellido1" id="apellido1" value="{{ $pasajero->apellido1 }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="float:left" for="apellido2" >Apellido 2: &nbsp&nbsp</label>
                        <input style="float:left" type="text" name="apellido2" id="apellido2" value="{{ $pasajero->apellido2 }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="float:left" for="genero" >Genero: &nbsp&nbsp</label>
                        <input style="float:left" type="text" name="genero" id="genero" value="{{ $pasajero->genero }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="float:left" for="fechaNacimiento" >Fecha nacimiento: &nbsp&nbsp</label>
                        <input style="float:left" type="text" name="fechaNacimiento" id="fechaNacimiento" value="{{ $pasajero->fechaNacimiento }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="float:left" for="correo" >Correo: {{ $pasajero->correo }}</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="float:left" for="telefono" >Teléfono de contacto: &nbsp&nbsp</label>
                        <input style="float:left" type="text" name="telefono" id="telefono" value="{{ $pasajero->telefono }}"/>
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
