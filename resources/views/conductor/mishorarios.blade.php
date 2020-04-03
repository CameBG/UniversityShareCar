@extends('conductor.master')

@section('content')

    <table> 
        <tr>
            <th> Fecha </th>
            <th> Hora </th>
            <th> Ida/Vuelta </th>
            <th> Coche </th>
            <th> Pasajeros </th>
        </tr>
        @foreach ($result as $r)
            <tr>
                <td>{{$r->fecha}}</td>
                <td>{{$r->hora}}</td>
                <td>{{$r->direccion}}</td>
                <td>{{$r->nombreCoche}}</td>
                <td>{{$r->asientos}}/{{$r->plazas}}</td>   
            </tr>
        @endforeach

    </table>
    {{$result->links()}}

@endsection