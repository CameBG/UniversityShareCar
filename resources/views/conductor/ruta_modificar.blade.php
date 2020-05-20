@extends('conductor.master')

@section('content')

<script type= "text/javascript">
    function ConfirmDelete(){
        var respuesta = confirm("Si modificas la ruta se verán afectados y serán eliminados todos tus viajes. ¿Estás seguro?");

        if (respuesta){
            return true;
        }
        else{
            return false;
        }
    }
</script>

<h1> Configurar tu ruta </h1>
<div>
    <br> <br>
</div>

<div style= "margin-left:33%">
        <form action = "{{ action('ConductorController@ruta_modificada', ['correo'=>$conductor->correo]) }}" method="POST">
        @csrf
            <table>
                <tr>
                    <td>
                        <label style="float:left" for="localidad" >Localidad: &nbsp&nbsp</label>
                        <input style="float:left" type="text" name="localidad" id="localidad" value="{{ $conductor->ruta->localidad }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="float:left" for="universidad" >Universidad: &nbsp&nbsp</label>
                        <input style="float:left" type="text" name="universidad" id="universidad" value="{{ $conductor->ruta->universidad }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="float:left" for="puntoRecogida" >Punto de Recogida: &nbsp&nbsp</label>
                        <input style="float:left" type="text" name="puntoRecogida" id="puntoRecogida" value="{{ $conductor->puntoRecogida }}"/>
                    </td>
                </tr>

                <tr><td>&nbsp</td></tr>
                <tr><td>&nbsp</td></tr>
            </table>
            <button type="submit" class="btn btn-primary" onclick= "return ConfirmDelete()"><a style = "color:white"> </a><i class="fas fa-check"></i> Aceptar cambios.</button>
            
        </form>

        {{--Error messages--}}
        @if (count($errors) > 0)
            <div style="float:left" class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
    </div>
@endsection