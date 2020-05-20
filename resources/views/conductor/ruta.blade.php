@extends('conductor.master')

@section('content')

<h1> Tu ruta </h1>
<div>
    <br> <br>
</div>
<form>
    <div>
        <table>
            <tr><td> Localidad: {{ $conductor->ruta->localidad }} </td></tr>
            <tr><td> Universidad: {{ $conductor->ruta->universidad }} </td></tr>
            <tr><td> Punto de Recogida: {{ $conductor->puntoRecogida }} </td></tr>
            <tr><td>&nbsp</td></tr>
            <tr><td>&nbsp</td></tr>
        </table>
                
        <button type="submit" class="btn btn-primary"><a style="color:white" href="{{ action('ConductorController@ruta_modificar', ['correo'=>$conductor->correo]) }}"><i class="fas fa-edit"></i> Modifica ruta.</a></button>

    </div>
</form>
@endsection