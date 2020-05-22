@extends('layouts.app', ['actual' => 3])

@section('content')
<div style="display:inline-block">
    @if($existe_conductor)
        <form method="GET" action = "/conductor">
            @csrf
            <button type="submit" class="btn btn-primary"><i class="fas fa-car"></i> Conductor</a></button>
        </form>
    @else
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearConductorModal"><a style="color:white"><i class="fas fa-car"></i> Conductor</a></button>
    @endif
    
    <br>
    <br>

    @if($existe_pasajero)
        <form method="GET" action = "/pasajero">
            @csrf
            <button type="submit" class="btn btn-primary"><i class="fas fa-user"></i> Pasajero</a></button>
        </form>
    @else
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearPasajeroModal"><a style="color:white"><i class="fas fa-user"></i> Pasajero</a></button>
    @endif
    
    <br>
    <br>

    @if($existe_admin)
        <form method="GET" action = "/administrador/conductores">
            @csrf
            <button type="submit" class="btn btn-primary"><i class="fas fa-user-cog"></i> Administrador</a></button>
        </form>
    @endif
</div>

    
     <!-- Crear Conductor Modal -->
     <div class="modal fade" id="crearConductorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rellena tus datos de conductor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form method="POST" action="{{ action('HomeController@nuevoConductor_crear') }}">

                        @csrf

                        <div class="modal-body"> 
                            <div class="form-group">
                                <label for="correo" > Correo: </label>
                                <select id="correo" name="correo">
                                        <option> {{ Auth::user()->email }} </option>
                                </select>
                            </div>      
                            <div class="form-group">
                                <label for="nombre" > Nombre: </label>
                                <input type="text" class="form-control" name="nombre" id="nombre">
                            </div>  
                            <div class="form-group">
                                <label for="apellido1" > Primer Apellido: </label>
                                <input type="text" class="form-control" name="apellido1" id="apellido1">
                            </div>        
                            <div class="form-group">
                                <label for="apellido2" > Segundo Apellido: </label>
                                <input type="text" class="form-control" name="apellido2" id="apellido2">
                            </div> 
                            <div class="form-group">
                                <label for="genero" > Género: </label>
                                <select id="genero" name="genero">
                                    <option value="Mujer">Mujer</option>
                                    <option value="Hombre">Hombre</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="telefono" > Teléfono: </label>
                                <input type="text" class="form-control" name="telefono" id="telefono">
                            </div>
                            <div class="form-group">
                                <label for="fechaNacimiento" > Fecha de nacimiento: </label>
                                <input type="text" class="form-control" name="fechaNacimiento" id="fechaNacimiento">
                            </div>
                            <div class="form-group">
                                <label for="localidad" > Localidad: </label>
                                <input type="text" class="form-control" name="localidad" id="localidad">
                            </div> 
                            <div class="form-group">
                            <label for="universidad" > Universidad: </label>
                                <input type="text" class="form-control" name="universidad" id="universidad">
                            </div> 
                            <div class="form-group">
                            <label for="puntoRecogida" > Punto de Recogida: </label>
                                <input type="text" class="form-control" name="puntoRecogida" id="puntoRecogida">
                            </div> 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!-- Crear Pasajero Modal -->
<div class="modal fade" id="crearPasajeroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rellena tus datos de conductor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <form method="POST" action="{{ action('HomeController@nuevoPasajero_crear') }}">

                        @csrf

                        <div class="modal-body"> 
                            <div class="form-group">
                                <label for="correo" > Correo: </label>
                                <select id="correo" name="correo">
                                        <option> {{ Auth::user()->email }} </option>
                                </select>
                            </div>      
                            <div class="form-group">
                                <label for="nombre" > Nombre: </label>
                                <input type="text" class="form-control" name="nombre" id="nombre">
                            </div>  
                            <div class="form-group">
                                <label for="apellido1" > Primer Apellido: </label>
                                <input type="text" class="form-control" name="apellido1" id="apellido1">
                            </div>        
                            <div class="form-group">
                                <label for="apellido2" > Segundo Apellido: </label>
                                <input type="text" class="form-control" name="apellido2" id="apellido2">
                            </div> 
                            <div class="form-group">
                                <label for="genero" > Género: </label>
                                <select id="genero" name="genero">
                                    <option value="Mujer">Mujer</option>
                                    <option value="Hombre">Hombre</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="telefono" > Teléfono: </label>
                                <input type="text" class="form-control" name="telefono" id="telefono">
                            </div>
                            <div class="form-group">
                                <label for="fechaNacimiento" > Fecha de nacimiento: </label>
                                <input type="text" class="form-control" name="fechaNacimiento" id="fechaNacimiento">
                            </div>
                            <div class="form-group">
                                <label for="fechaNacimiento" > Imagen de perfil: </label>
                                <input name="imagen" id="imagen" type="file" accept="image/jpeg, image/png"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
@endsection
