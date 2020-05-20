@extends('conductor.master', ['actual' => 1])

@section('content')

    <h1> Coches </h1>

    <div>
        <br><br>
        <form method="GET" action ="{{ action('ConductorController@coches_crear') }}">
            @csrf
            <button type="submit" class="btn btn-primary"><a style="color:white">➕ Añadir nuevo coche</a></button>
        </form>
        
    </div>
    <div style= "margin-left:33%">
        <table>
            @foreach($coches as $coche)
            <tr height="50px">
                <td>
                    {{ $coche->nombreCoche }} &nbsp&nbsp&nbsp&nbsp 
                    <a href="{{ action('ConductorController@coches_borrar',  ['matricula' => $coche->matricula]) }}"><i style="float:right" class="fas fa-trash-alt">Borrar</i></a>
                    <a href="{{ action('ConductorController@coches_modificar',  ['matricula' => $coche->matricula]) }}"><i style="float:right" class="fas fa-edit">Editar&nbsp&nbsp&nbsp</i></a>
                </td>
                <td></td>
            </tr>

            <tr>
                <td rowspan="5" width="320px" height="20px">
                    @if (isset($coche->rutaImagen))
                        <img src="/images/{{ $coche->rutaImagen }}" width="300px" height="auto">
                    @else
                        <img src="/images/default.jpg" width="300px" height="auto">
                    @endif
                </td>
                <td>Matricula: {{ $coche->matricula }}</td>
            </tr>

            <tr><td>Marca: {{ $coche->marca }}</td></tr>
            <tr><td>Modelo: {{ $coche->modelo }}</td></tr>
            <tr><td>Plazas: {{ $coche->plazas}}</td></tr>
            <tr><td>Precio/Viaje: {{ $coche->precioViaje }}€</td></tr>

            <tr><td>&nbsp</td></tr>
            <tr><td>&nbsp</td></tr>
            @endforeach
        </table>

        {{ $coches->appends([])->links() }}
    </div>
@endsection