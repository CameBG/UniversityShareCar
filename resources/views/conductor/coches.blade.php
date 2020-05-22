@extends('conductor.master', ['actual' => 1])

@section('content')

    <script type= "text/javascript">
        function ConfirmDelete(){
            var respuesta = confirm("Si eliminas el coche se borrarán todos tus viajes. ¿Estás seguro?");

            if (respuesta){
                return true;
            }
            else{
                return false;
            }
        }
    </script>


<div class="col-md-5">
    <div class="card w-100 my-4 mx-5">
        <div class="card-header">
            <h1 style="text-align:center; display:inline-block">Coches</h1>
            <!--<form style="display:inline-block; float:right" method="GET" action ="{{ action('ConductorController@coches_crear') }}">
                @csrf
                <button style="margin-right:10px" type="submit" class="btn btn-primary"><i class="fas fa-plus"></i>   Nuevo coche</button>
            </form>-->

            <button style="display:inline-block; float:right"  type="submit" class="btn btn-primary" data-toggle="modal" data-target="#crearCocheModal"><i class="fas fa-plus"></i>   Nuevo coche</button>
        
        </div>
        <div class="card-body">
            <table>
                @foreach($coches as $coche)
                <tr height="50px">
                    <td>
                        <h3 style="display:inline-block">{{ $coche->nombreCoche }} &nbsp&nbsp&nbsp&nbsp </h3>
                    </td>
                    <td>
                        <form style="display:inline-block; float:right" method="POST" action ="{{ action('ConductorController@coches_borrar',  ['matricula' => $coche->matricula]) }}">
                            @csrf
                            <button onclick="return ConfirmDelete()" style="margin-right:10px" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i>   Borrar</button>
                        </form>

                        <button style="margin-right:10px"  type="submit" class="btn btn-primary" data-toggle="modal" data-target="#editar-coche-{{ $coche->matricula }}"><i class="fas fa-edit"></i>   Editar</button>
                    </td>
                        
                        <!--<a onclick="return ConfirmDelete()" href="{{ action('ConductorController@coches_borrar',  ['matricula' => $coche->matricula]) }}"><i style="float:right" class="fas fa-trash-alt">Borrar</i></a>
                        <a href="{{ action('ConductorController@coches_modificar',  ['matricula' => $coche->matricula, 'page' => $page]) }}"><i style="float:right" class="fas fa-edit">Editar&nbsp&nbsp&nbsp</i></a>-->
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td rowspan="5" width="320px" height="20px">
                        @if (isset($coche->rutaImagen))
                            <img src="/images/{{ $coche->rutaImagen }}" width="300px" height="auto">
                        @else
                            <img src="/defaultImages/defaultCoche.jpg" width="300px" height="auto">
                        @endif
                    </td>
                    <td>Matricula: {{ $coche->matricula }}</td>
                </tr>

                <tr><td>Marca: {{ $coche->marca }}</td></tr>
                <tr><td>Modelo: {{ $coche->modelo }}</td></tr>
                <tr><td>Plazas: {{ $coche->plazas}}</td></tr>
                <tr><td>Precio/Viaje: {{ $coche->precioViaje }}€</td></tr>
                @endforeach
            </table>
        </div>
        <br>
        <div class="card-footer">
            {{ $coches->appends([])->links() }}
        </div>
    </div>
</div>


<!-- Nuevo Coche Modal -->
<div class="modal fade" id="crearCocheModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edita los datos del coche</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form method="POST" action = "{{ action('ConductorController@coches_creado') }}" enctype="multipart/form-data">

                @csrf

                <div class="modal-body"> 
                    <div class="form-group">
                        <label for="nombre"> Nombre: </label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div> 
                    <div class="form-group">
                        <label for="nombre"> Matricula: </label>
                        <input type="text" class="form-control" name="matricula" id="matricula">
                    </div>    
                    <div class="form-group">
                        <label for="imagen" > Imagen: </label>
                        <input name="imagen" id="imagen" type="file" accept="image/jpeg, image/png"/>
                    </div>  
                    <div class="form-group">
                        <label for="marca" > Marca: </label>
                        <input type="text" class="form-control" name="marca" id="marca">
                    </div>  
                    <div class="form-group">
                        <label for="modelo" > Modelo: </label>
                        <input type="text" class="form-control" name="modelo" id="modelo">
                    </div>        
                    <div class="form-group">
                        <label for="plazas" > Plazas: </label>
                        <input type="text" class="form-control" name="plazas" id="plazas">
                    </div> 
                    <div class="form-group">
                        <label for="precio" > Precio/Viaje: </label>
                        <input type="text" class="form-control" name="precio" id="precio">
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

@foreach($coches as $coche)
<!-- Editar Coche Modal -->
<div class="modal fade" id="editar-coche-{{ $coche->matricula }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edita los datos del coche</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <form method="POST" action = "{{ action('ConductorController@coches_modificado', ['matricula'=>$coche->matricula, 'page'=>$page]) }}" enctype="multipart/form-data">

                @csrf

                <div class="modal-body"> 
                    <div class="form-group">
                        <label for="nombre"> Nombre: </label>
                        <input type="text" class="form-control" name="nombre" id="nombre" value = "{{$coche->nombreCoche}}" >
                    </div>    
                    <div class="form-group">
                        <label for="imagen" > Editar Imagen: </label>
                        <input name="imagen" id="imagen" type="file" accept="image/jpeg, image/png"/>
                    </div>  
                    <div class="form-group">
                        <label for="marca" > Marca: </label>
                        <input type="text" class="form-control" name="marca" id="marca" value = "{{$coche->marca}}">
                    </div>  
                    <div class="form-group">
                        <label for="modelo" > Modelo: </label>
                        <input type="text" class="form-control" name="modelo" id="modelo" value = "{{$coche->modelo}}">
                    </div>        
                    <div class="form-group">
                        <label for="plazas" > Plazas: </label>
                        <input type="text" class="form-control" name="plazas" id="plazas" value = "{{$coche->plazas}}">
                    </div> 
                    <div class="form-group">
                        <label for="precio" > Precio/Viaje: </label>
                        <input type="text" class="form-control" name="precio" id="precio" value = "{{$coche->precioViaje}}">
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
@endforeach
@endsection