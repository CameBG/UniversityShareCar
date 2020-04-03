@extends('conductor.master')

@section('content')
    <h1> Mis horarios </h1>
    <div style="height:100px">
        <br><br>
        <form method="POST" action = "{{ action('ConductorController@misHorarios',  ['sort' => $sort, 'sort2' => $sort2, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta]) }}">
            @csrf
            <div style="float:left" class="form-group row">
                <i style="float:left" class="fas fa-calendar-week fa-2x" class="col-sm-2 col-form-label"> </i>
                &nbsp
                <input type="text" name="fechaDesde" id="fechaDesde" value="{{ old('fechaDesde') }}" placeholder="{{ $fechaDesde }}"/>
                &nbsp&nbsp&nbsp
                <i style="float:left" class="fas fa-calendar-week fa-2x" class="col-sm-2 col-form-label"> </i>
                &nbsp
                <input type="text" name="fechaHasta" id="fechaHasta" value="{{ old('fechaHasta') }}" placeholder="{{ $fechaHasta }}"/>
                &nbsp&nbsp&nbsp
            </div>
            <p style="float:left">&nbsp&nbsp&nbsp</p>
            <button style="float:left" type="submit" class="btn btn-primary">✔</button>
        </form>

        <form style="float:right" method="POST">
            @csrf
            <div style="float:left" class="form-group row">
                <label for="viajeNuevo">Viaje Nuevo</label>
                &nbsp&nbsp&nbsp
            </div>
            <p style="float:left">&nbsp&nbsp&nbsp</p>
            <button style="float:left" type="submit" class="btn btn-primary"><a href="nuevohorario" > ➕</a></button>
            <p style="float:left">&nbsp&nbsp&nbsp</p>
        </form>
        
    </div>
    <table class = 'table table-striped'> 
        <tr>
            <th> 
                <a href="{{ action('ConductorController@misHorarios',  ['sort' => 'fecha', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta]) }}">Fecha</a>
            </th>
            <th> 
                <a href="{{ action('ConductorController@misHorarios',  ['sort' => 'hora', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta]) }}">Hora</a>
            </th>
            <th> 
                <a href="{{ action('ConductorController@misHorarios',  ['sort' => 'direccion', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta]) }}">Ida/Vuelta</a>
            </th>
            <th> 
                <a href="{{ action('ConductorController@misHorarios',  ['sort' => 'nombreCoche', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta]) }}">Coche</a>
            </th>
            <th> 
                <a href="{{ action('ConductorController@misHorarios',  ['sort' => 'asientos', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta]) }}">Pasajeros</a> 
            </th>
            <th>
                
            </th>
        </tr>
        @foreach ($result as $r)
            <tr>
                <td>{{$r->fecha}}</td>
                <td>{{$r->hora}}</td>
                <td>{{$r->direccion}}</td>
                <td>{{$r->nombreCoche}}</td>
                <td>{{$r->asientos}}/{{$r->plazas}}</td>
                <td><button style="float:left" type="submit" class="btn btn-primary">❌</button></td>  
            </tr>
        @endforeach

    </table>
    
    {{$result->appends(['sort' => $sort, 'sort2' => $sort2, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta])->links()}}

    

@endsection