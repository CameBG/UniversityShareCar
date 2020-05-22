@extends('administrador.master', ['actual' => 6])

@section('content')
<script type= "text/javascript">
        function ConfirmDelete(){
            var respuesta = confirm("¿Seguro de eliminar este coche?");

            if (respuesta){
                return true;
            }
            else{
                return false;
            }
        }
</script>

<h1> Coches </h1>
<div style="height:100px">
    <br><br>
    <table class = 'table table-striped'>
        <tr align="center">
            <th>
                <a href="{{ action('AdministradorController@coches', ['page' => $page,'sort' => 'matricula', 'sort2' => $sort]) }}">
                   Matrícula <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th>
                <a href="{{ action('AdministradorController@coches', ['page' => $page,'sort' => 'nombre', 'sort2' => $sort]) }}">
                    Nombre <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th>
                <a href="{{ action('AdministradorController@coches', ['page' => $page,'sort' => 'marca', 'sort2' => $sort]) }}">
                    Marca <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th>
                <a href="{{ action('AdministradorController@coches', ['page' => $page, 'sort' => 'modelo', 'sort2' => $sort]) }}">
                    Modelo <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th>
                <a href="{{ action('AdministradorController@coches', ['page' => $page, 'sort' => 'plazas', 'sort2' => $sort]) }}">
                    Plazas <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th>
                <a href="{{ action('AdministradorController@coches', ['page' => $page, 'sort' => 'precioViaje', 'sort2' => $sort]) }}">
                    Precio <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th>
                <a href="{{ action('AdministradorController@coches', ['page' => $page, 'sort' => 'conductor_correo', 'sort2' => $sort]) }}">
                    Conductor <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
        </tr>
        @foreach ($result as $r)
            <tr align="center">
                <td>{{$r->matricula}}</td>
                <td>{{$r->nombre}}</td>
                <td>{{$r->marca}}</td>
                <td>{{$r->modelo}}</td>
                <td>{{$r->plazas}}</td>
                <td>{{$r->precioViaje}}</td>
                <td>{{$r->conductor_correo}}</td>
                <td>
                    <form style="display:inline-block" method="POST" action ="{{ action('AdministradorController@coche_ver',  ['matricula'=>$r->matricula]) }}">
                        @csrf
                        <button type="submit" class="btn btn-success"><i class="fas fa-search"></i></button>
                    </form>
                    <form style="display:inline-block; margin-left:10px" method="POST" action ="{{ action('AdministradorController@borrarCoche',  ['matricula'=>$r->matricula]) }}">
                        @csrf
                        <button onclick="return ConfirmDelete()" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{$result->appends(['page' => $page,'sort' => $sort, 'sort2' => $sort2,])->links()}}
</div>


@endsection