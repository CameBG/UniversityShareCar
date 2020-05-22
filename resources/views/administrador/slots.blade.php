@extends('administrador.master', ['actual' => 4])

@section('content')
<script type= "text/javascript">
        function ConfirmDelete(){
            var respuesta = confirm("¿Seguro de eliminar este slot?");

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
                <h1 style="text-align:center; display:inline-block"> Slots </h1>
            </div>
                <div class="card-body">
                    <table class = 'table table-striped'>
                        <tr align="center">
                            <th>
                                <a href="{{ action('AdministradorController@slots', ['page' => $page,'sort' => 'id', 'sort2' => $sort]) }}">
                                    ID <i class="fas fa-arrows-alt-v"></i>
                                </a>
                            </th>
                            <th>
                                <a href="{{ action('AdministradorController@slots', ['page' => $page,'sort' => 'fecha', 'sort2' => $sort]) }}">
                                    Fecha <i class="fas fa-arrows-alt-v"></i>
                                </a>
                            </th>
                            <th>
                                <a href="{{ action('AdministradorController@slots', ['page' => $page,'sort' => 'hora', 'sort2' => $sort]) }}">
                                    Hora <i class="fas fa-arrows-alt-v"></i>
                                </a>
                            </th>
                            <th>
                                <a href="{{ action('AdministradorController@slots', ['page' => $page, 'sort' => 'direccion', 'sort2' => $sort]) }}">
                                    Dirección <i class="fas fa-arrows-alt-v"></i>
                                </a>
                            </th>
                            <th>
                                <a href="{{ action('AdministradorController@slots', ['page' => $page, 'sort' => 'coche_matricula', 'sort2' => $sort]) }}">
                                    Coche <i class="fas fa-arrows-alt-v"></i>
                                </a>
                            </th>
                        </tr>
                        @foreach ($result as $r)
                            <tr align="center">
                                <td>{{$r->id}}</td>
                                <td>{{$r->fecha}}</td>
                                <td>{{$r->hora}}</td>
                                <td>{{$r->direccion}}</td>
                                <td>{{$r->coche_matricula}}</td>
                                <td>
                                    <form method="POST" action ="{{ action('AdministradorController@borrarSlot',  ['id'=>$r->id]) }}">
                                        @csrf
                                        <button onclick="return ConfirmDelete()" style="float:left" type="submit" class="btn btn-primary">❌</button>
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
    </div>

@endsection