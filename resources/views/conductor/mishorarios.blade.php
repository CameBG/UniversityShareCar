@extends('conductor.master')

@section('content')

    <table class = 'table table-striped'> 
        <tr>
            <th> 
                <a href="{{ action('MisHorariosController@showHorarios',  ['sort' => 'fecha', 'sort2' => $sort]) }}">Fecha</a>
            </th>
            <th> 
                <a href="{{ action('MisHorariosController@showHorarios',  ['sort' => 'hora', 'sort2' => $sort]) }}">Hora</a>
            </th>
            <th> 
                <a href="{{ action('MisHorariosController@showHorarios',  ['sort' => 'direccion', 'sort2' => $sort]) }}">Ida/Vuelta</a>
            </th>
            <th> 
                <a href="{{ action('MisHorariosController@showHorarios',  ['sort' => 'nombreCoche', 'sort2' => $sort]) }}">Coche</a>
            </th>
            <th> 
                <a href="{{ action('MisHorariosController@showHorarios',  ['sort' => 'asientos', 'sort2' => $sort]) }}">Pasajeros</a> 
            </th>
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
    
    {{$result->appends(['sort' => $sort, 'sort2' => $sort2])->links()}}
    

@endsection