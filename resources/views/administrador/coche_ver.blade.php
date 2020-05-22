@extends('administrador.master', ['actual' => 6])

@section('content')

    <h1> Ver coche </h1>

    <div style= "margin-left:33%">
        <table>
            <tr height="50px">
                <td>
                    {{ $coche->nombreCoche }} &nbsp&nbsp&nbsp&nbsp 
                </td>
                <td></td>
            </tr>

            <tr>
                <td rowspan="5" width="320px" height="20px">
                    @if (isset($coche->rutaImagen))
                        <img src="/images/{{ $coche->rutaImagen }}" width="300px" height="auto">
                    @else
                        <img src="/defaultImages/defaultCoche.jpg" width="300px" height="auto">
                    @endif
                </td>
                <td>Matricula: {{ $coche->matricula }}</td>
            </tr>

            <tr><td>Marca: {{ $coche->marca }}</td></tr>
            <tr><td>Modelo: {{ $coche->modelo }}</td></tr>
            <tr><td>Plazas: {{ $coche->plazas}}</td></tr>
            <tr><td>Precio/Viaje: {{ $coche->precioViaje }}€</td></tr>
        </table>

        <br>
    </div>
@endsection