@extends('administrador.master', ['actual' => 1])

@section('content')

<h1> Crear un nuevo conductor </h1>
    
    <div style= "height:100px">
        <br><br>
        <div>
            <form method="POST" action="{{ action('AdministradorController@nuevoConductor_crear') }}">
                @csrf

                <div class = "form-group row">
                    <label for="correo" class="col-sm2 col-form-label"> Correo: </label>
                    <div class="col-sm-10">
                        <select id="correo" name="correo">
                            @foreach($users as $user)
                                <option> {{ $user->email }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class = "form-group row">
                    <label for="nombre" class="col-sm2 col-form-label"> Nombre: </label>
                    <div class="col-sm-10">
                        <input type="text" name="nombre" id="nombre"/>
                    </div>    
                </div>

                <div class = "form-group row">
                    <label for="apellido1" class="col-sm2 col-form-label"> Primer Apellido: </label>
                    <div class="col-sm-10">
                        <input type="text" name="apellido1" id="apellido1"/>
                    </div>
                    
                </div>

                <div class = "form-group row">
                    <label for="apellido2" class="col-sm2 col-form-label"> Segundo Apellido: </label>
                    <div class="col-sm-10">
                        <input type="text" name="apellido2" id="apellido2"/>
                    </div>
                    
                </div>

                <div class = "form-group row">
                    <label for="genero" class="col-sm2 col-form-label"> Género: </label>
                    <div class="col-sm-10">
                        <select id="genero" name="genero">
                            <option value="Mujer">Mujer</option>
                            <option value="Hombre">Hombre</option>
                        </select>
                    </div>
                </div>

                <div class = "form-group row">
                    <label for="telefono" class="col-sm2 col-form-label"> Teléfono: </label>
                    <div class="col-sm-10">
                        <input type="text" name="telefono" id="telefono"/>
                    </div>
                </div>
                <div class = "form-group row">
                    <label for="fechaNacimiento" class="col-sm2 col-form-label"> Fecha de nacimiento: </label>
                    <div class="col-sm-10">
                        <input type="text" name="fechaNacimiento" id="fechaNacimiento"/>
                    </div>
                </div>
                <div class = "form-group row">
                    <label for="localidad" class="col-sm2 col-form-label"> Localidad: </label>
                    <div class="col-sm-10">
                        <input type="text" name="localidad" id="localidad"/>
                    </div>
                </div>
                <div class = "form-group row">
                    <label for="universidad" class="col-sm2 col-form-label"> Universidad: </label>
                    <div class="col-sm-10">
                        <input type="text" name="universidad" id="universidad"/>
                    </div>
                </div>
                <div class = "form-group row">
                    <label for="puntoRecogida" class="col-sm2 col-form-label"> Punto de Recogida: </label>
                    <div class="col-sm-10">
                        <input type="text" name="puntoRecogida" id="puntoRecogida"/>
                    </div>
                </div>
                
                
                <div>
                <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
            </div>
            
        </div>
        <div>
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
     
    </div>



@endsection