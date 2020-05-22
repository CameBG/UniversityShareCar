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

<h1> Usuarios </h1>
<div style="height:100px">
    <br><br>
    
    <table class = 'table table-striped'>
        <tr align="center">
            <th>
                <a href="{{ action('AdministradorController@users', ['page' => $page,'sort' => 'email', 'sort2' => $sort]) }}">
                    Correo <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
        </tr>
        @foreach ($result as $r)
            <tr align="center">
                <td>{{$r->email}}</td>
                <td>
                    <form method="POST" action ="{{ action('AdministradorController@borrarUser',  ['email'=>$r->email]) }}">
                        @csrf
                        <button onclick="return ConfirmDelete()" style="float:left" type="submit" class="btn btn-primary">❌</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>

{{$result->appends(['page' => $page,'sort' => $sort, 'sort2' => $sort2,])->links()}}
@endsection