@extends('pasajero.master')

@section('content')
    <h1> Mis Reservas </h1>
    <div style="height:100px">
        <br><br>
        <form  method="POST" action = "{{ action('PasajeroController@misReservas',  ['sort' => $sort, 'sort2' => $sort2, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">
            @csrf
            <div style="float:right" class="form-group row">
                <i style="float:right" class="fas fa-user fa-2x" class="col-sm-2 col-form-label"></i>
                <div class="col-sm-10">
                    <input type="text" name="personaElegida" id="personaElegida" value="{{ old('personaElegida') }}" placeholder="{{ $personaElegida }}"/>
                </div>
            </div>
            <p style="float:right">&nbsp&nbsp&nbsp</p>
            <p style="float:right">&nbsp&nbsp&nbsp</p>
            <button style="float:right" type="submit" class="btn btn-primary">✔</button>
        </form>
        <form method="POST" action = "{{ action('PasajeroController@misReservas',  ['sort' => $sort, 'sort2' => $sort2, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">
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
        
    </div>
    <table class = 'table table-striped'> 
        <tr>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['sort' => 'fecha', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">Fecha</a>
            </th>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['sort' => 'hora', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">Hora</a>
            </th>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['sort' => 'direccion', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">Ida/Vuelta</a>
            </th>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['sort' => 'asientos', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">Asientos</a>
            </th>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['sort' => 'recogida', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">Punto de Recogida</a> 
            </th>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['sort' => 'localidad', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">Localidad</a> 
            </th>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['sort' => 'precio', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">Precio</a> 
            </th>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['sort' => 'uni', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">Uni</a> 
            </th>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['sort' => 'coche', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">Coche</a> 
            </th>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['sort' => 'conductor', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">Conductor</a> 
            </th>
            <th>
                
            </th>
        </tr>
        @foreach ($result as $r)
            <tr>
                <td>{{$r->fecha}}</td>
                <td>{{$r->hora}}</td>
                <td>{{$r->direccion}}</td>
                <td>{{$r->asientos}}</td>
                <td>{{$r->recogida}}</td>
                <td>{{$r->localidad}}</td>
                <td>{{$r->precio}}€</td>
                <td>{{$r->uni}}</td>
                <td>{{$r->nombreCoche}}</td>
                <td>{{$r->nombre}} {{$r->apellido1}} {{$r->apellido2}}</td>
                <td><button style="float:left" type="submit" class="btn btn-primary">❌</button></td>
            </tr>
        @endforeach

    </table>
    
    {{$result->appends(['sort' => $sort, 'sort2' => $sort2, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida])->links()}}

    

@endsection