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

<h1> Pasajeros </h1>

<div style="height:100px">
    <br><br>
    <table class = 'table table-striped'>
        <tr align="center">
            <th>
                <a href="{{ action(AdministradorController@pasajeros', [ 'sort' => 'correo', 'sort2' => $sort]) }}">
                    Correo <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th>
                <a href="{{ action('AdministradorController@pasajeros', ['sort' => 'nombre', 'sort2' => $sort]) }}">
                    Nombre <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th>
                <a href="{{ action('AdministradorController@pasajeros', ['sort' => 'apellido1', 'sort2' => $sort]) }}">
                    Primer apellido <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th>
                <a href="{{ action('AdministradorController@pasajeros', ['sort' => 'apellido2', 'sort2' => $sort]) }}">
                    Segundo apellido <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th>
                <a href="{{ action('AdministradorController@pasajeros', ['sort' => 'fechaNacimiento', 'sort2' => $sort]) }}">
                    Fecha de nacimiento <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th>
                <a href="{{ action('AdministradorController@pasajeros', ['sort' => 'genero', 'sort2' => $sort]) }}">
                    Género <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th>
                <a href="{{ action('AdministradorController@pasajeros', ['sort' => 'telefono', 'sort2' => $sort]) }}">
                    Teléfono <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
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
                    <form method="POST" action ="{{ action('AdministradorController@borrarPasajero',  ['correo'=>$r->correo]) }}">
                        @csrf
                        <button onclick="return ConfirmDelete()" style="float:left" type="submit" class="btn btn-primary">❌</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>

{{$result->appends(['sort' => $sort, 'sort2' => $sort2,])->links()}}
@endsection