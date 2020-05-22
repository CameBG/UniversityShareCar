@extends('administrador.master', ['actual' => 5])

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
                <h1 style="text-align:center; display:inline-block"> LineaSlots </h1>
            </div>

            <div class="card-body">
                <table class = 'table table-striped'>
                    <tr align="center">
                        <th>
                            <a href="{{ action('AdministradorController@lineaslots', ['page' => $page,'sort' => 'slot_id', 'sort2' => $sort]) }}">
                                Slot <i class="fas fa-arrows-alt-v"></i>
                            </a>
                        </th>
                        <th>
                            <a href="{{ action('AdministradorController@lineaslots', ['page' => $page,'sort' => 'numAsiento', 'sort2' => $sort]) }}">
                                Asiento <i class="fas fa-arrows-alt-v"></i>
                            </a>
                        </th>
                        <th>
                            <a href="{{ action('AdministradorController@lineaslots', ['page' => $page,'sort' => 'pasajero_correo', 'sort2' => $sort]) }}">
                                Pasajero <i class="fas fa-arrows-alt-v"></i>
                            </a>
                        </th>
                    </tr>
                    @foreach ($result as $r)
                        <tr align="center">
                            <td>{{$r->slot_id}}</td>
                            <td>{{$r->numAsiento}}</td>
                            <td>{{$r->pasajero_correo}}</td>
                            <td>
                                <form method="POST" action ="{{ action('AdministradorController@borrarLineaSlot',  ['slot_id'=>$r->slot_id, 'numAsiento' => $r->numAsiento, 'pasajero_correo' => $r->pasajero_correo]) }}">
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