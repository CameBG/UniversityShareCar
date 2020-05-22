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

<div style="margin-left:25%">
    <div class="col-md-6">
        <div class="card w-100 my-4 mx-5">
            <div class="card-header">
                <h1 style="text-align:center; display:inline-block">Rutas</h1>
                <form style="display:inline-block; float:right" method="GET" action ="{{ action('AdministradorController@nuevaRuta') }}">
                    @csrf
                    <button style="margin-right:10px" type="submit" class="btn btn-primary"><i class="fas fa-plus"></i>   Nueva ruta</button>
                </form>
            </div>
            <div class="card-body">
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
    
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="card-footer">
                {{$result->appends(['page' => $page,'sort' => $sort, 'sort2' => $sort2,])->links()}}
            </div>
        </div>
    </div>
</div>


@endsection