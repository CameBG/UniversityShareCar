@extends('administrador.master', ['actual' => 2])

@section('content')
<script type= "text/javascript">
        function ConfirmDelete(){
            var respuesta = confirm("¿Seguro de eliminar este usario?");

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
                <h1 style="text-align:center">Usuarios</h1>
            </div>
            <div class="card-body">
                <table class = 'table table-striped'>
                    <tr align="center">
                        <th>
                            <a href="{{ action('AdministradorController@users', ['page' => $page,'sort' => 'email', 'sort2' => $sort]) }}">
                                Correo <i class="fas fa-arrows-alt-v"></i>
                            </a>
                        </th>
                        <th></th>
                    </tr>
                    @foreach ($result as $r)
                        <tr align="center">
                            <td>{{$r->email}}</td>
                            <td>
                                <form method="POST" action ="{{ action('AdministradorController@borrarUser',  ['email'=>$r->email]) }}">
                                    @csrf
                                    <button onclick="return ConfirmDelete()" style="float:left" type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
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