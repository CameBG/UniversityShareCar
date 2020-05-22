@extends('administrador.master', ['actual' => 3])

@section('content')
<script type= "text/javascript">
        function ConfirmDelete(){
            var respuesta = confirm("¿Seguro de eliminar esta ruta?");

            if (respuesta){
                return true;
            }
            else{
                return false;
            }
        }
</script>

<h1> Usuarios </h1>
<div style="height:100px">
    <br><br>
    

    <form style="float:right" method="GET" action ="{{ action('AdministradorController@nuevaRuta') }}">
            @csrf
            <div style="float:left" class="form-group row">
                <label for="rutaNuevo">Nueva Ruta</label>
                &nbsp&nbsp&nbsp
            </div>
            <p style="float:left">&nbsp&nbsp&nbsp</p>
            <button style="float:left" type="submit" class="btn btn-primary">➕</button>
            <p style="float:left">&nbsp&nbsp&nbsp</p>
    </form>

    <table class = 'table table-striped'>
        <tr align="center">
            <th>
                <a href="{{ action('AdministradorController@rutas', ['page' => $page,'sort' => 'id', 'sort2' => $sort]) }}">
                    ID <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th>
                <a href="{{ action('AdministradorController@rutas', ['page' => $page,'sort' => 'localidad', 'sort2' => $sort]) }}">
                    Localidad <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th>
                <a href="{{ action('AdministradorController@rutas', ['page' => $page,'sort' => 'universidad', 'sort2' => $sort]) }}">
                    Universidad <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
        </tr>
        @foreach ($result as $r)
            <tr align="center">
                <td>{{$r->id}}</td>
                <td>{{$r->localidad}}</td>
                <td>{{$r->universidad}}</td>
                <td>
                    <form method="POST" action ="{{ action('AdministradorController@borrarRuta',  ['id'=>$r->id]) }}">
                        @csrf
                        <button onclick="return ConfirmDelete()" style="float:left" type="submit" class="btn btn-primary">❌</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{$result->appends(['page' => $page,'sort' => $sort, 'sort2' => $sort2,])->links()}}
</div>


@endsection