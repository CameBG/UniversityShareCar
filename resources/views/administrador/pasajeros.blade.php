@extends('administrador.master', ['actual' => 0])

@section('content')
<script type= "text/javascript">
        function ConfirmDelete(){
            var respuesta = confirm("¿Seguro de eliminar este pasajero?");

            if (respuesta){
                return true;
            }
            else{
                return false;
            }
        }
</script>

<div class="col-md-11">
    <div class="card w-100 my-4 mx-5">
        <div class="card-header">
            <h1 style="text-align:center; display:inline-block">Pasajeros</h1>
            <form style="display:inline-block; float:right" method="GET" action ="{{ action('AdministradorController@nuevoPasajero') }}">
                @csrf
                <button style="margin-right:10px" type="submit" class="btn btn-primary"><i class="fas fa-plus"></i>   Nuevo pasajero</button>
            </form>
        </div>
        <div class="card-body">
            <table class = 'table table-striped'>
                <tr align="center">
                    <th>
                        <a href="{{ action('AdministradorController@pasajeros', ['page' => $page,'sort' => 'correo', 'sort2' => $sort]) }}">
                            Correo <i class="fas fa-arrows-alt-v"></i>
                        </a>
                    </th>
                    <th>
                        <a href="{{ action('AdministradorController@pasajeros', ['page' => $page,'sort' => 'nombre', 'sort2' => $sort]) }}">
                            Nombre <i class="fas fa-arrows-alt-v"></i>
                        </a>
                    </th>
                    <th>
                        <a href="{{ action('AdministradorController@pasajeros', ['page' => $page,'sort' => 'apellido1', 'sort2' => $sort]) }}">
                            Primer apellido <i class="fas fa-arrows-alt-v"></i>
                        </a>
                    </th>
                    <th>
                        <a href="{{ action('AdministradorController@pasajeros', ['page' => $page, 'sort' => 'apellido2', 'sort2' => $sort]) }}">
                            Segundo apellido <i class="fas fa-arrows-alt-v"></i>
                        </a>
                    </th>
                    <th>
                        <a href="{{ action('AdministradorController@pasajeros', ['page' => $page, 'sort' => 'fechaNacimiento', 'sort2' => $sort]) }}">
                            Fecha de nacimiento <i class="fas fa-arrows-alt-v"></i>
                        </a>
                    </th>
                    <th>
                        <a href="{{ action('AdministradorController@pasajeros', ['page' => $page, 'sort' => 'genero', 'sort2' => $sort]) }}">
                            Género <i class="fas fa-arrows-alt-v"></i>
                        </a>
                    </th>
                    <th>
                        <a href="{{ action('AdministradorController@pasajeros', ['page' => $page, 'sort' => 'telefono', 'sort2' => $sort]) }}">
                            Teléfono <i class="fas fa-arrows-alt-v"></i>
                        </a>
                    </th>
                    <th></th>
                </tr>
                @foreach ($result as $r)
                    <tr align="center">
                        <td>{{$r->correo}}</td>
                        <td>{{$r->nombre}}</td>
                        <td>{{$r->apellido1}}</td>
                        <td>{{$r->apellido2}}</td>
                        <td>{{$r->fechaNacimiento}}</td>
                        <td>{{$r->genero}}</td>
                        <td>{{$r->telefono}}</td>
                        <td>
                            <form style="display:inline-block" method="POST" action ="{{ action('AdministradorController@pasajero_ver',  ['correo'=>$r->correo]) }}">
                                @csrf
                                <button type="submit" class="btn btn-success"><i class="fas fa-search"></i></button>
                            </form>
                            <form style="display:inline-block; margin-left:10px" method="POST" action ="{{ action('AdministradorController@borrarPasajero',  ['correo'=>$r->correo]) }}">
                                @csrf
                                <button onclick="return ConfirmDelete()" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="card-footer">
            {{$result->appends(['page' => $page,'sort' => $sort, 'sort2' => $sort2,])->links()}}
        </div>
    </div>
</div>


@endsection