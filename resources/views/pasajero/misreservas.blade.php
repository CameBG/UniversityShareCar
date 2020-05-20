@extends('pasajero.master', ['actual' => 1])

@section('content')

    <h1 style="display:inline-block; width:35%">Mis Reservas</h1>
    @if ($borrado ?? false === true)
        <div style="display:inline-block; text-align:center; width:30%" class="alert alert-primary" role="alert">
            <ul>
                <li>Se ha borrado 1 asiento de la reserva seleccionada.</li>
            </ul>
        </div>
    @endif

    <div style="height:100px">
        <br><br>
        <form  method="POST" action = "{{ action('PasajeroController@misReservas',  ['page' => $page, 'sort' => $sort, 'sort2' => $sort2, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">
            @csrf
            <p style="float:right">&nbsp&nbsp&nbsp</p>
            <button style="float:right" type="submit" class="btn btn-primary">✔</button>
            <p style="float:right">&nbsp&nbsp&nbsp</p>
            <div style="float:right" class="form-group row">
                <i style="float:right" class="fas fa-user fa-2x"></i>
                <div class="col-sm-10">
                    <input type="text" name="personaElegida" id="personaElegida" value="{{ old('personaElegida') }}" placeholder="{{ $personaElegida }}"/>
                </div>
            </div>
        </form>
        
        <form method="POST" action = "{{ action('PasajeroController@misReservas',  ['page' => $page, 'sort' => $sort, 'sort2' => $sort2, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">
            @csrf
            <div style="float:left" class="form-group row">
                <i style="float:left" class="fas fa-calendar-week fa-2x"> </i>
                &nbsp
                <input type="text" name="fechaDesde" id="fechaDesde" value="{{ old('fechaDesde') }}" placeholder="{{ $fechaDesde }}"/>
                &nbsp&nbsp&nbsp
                <i style="float:left" class="fas fa-calendar-week fa-2x"> </i>
                &nbsp
                <input type="text" name="fechaHasta" id="fechaHasta" value="{{ old('fechaHasta') }}" placeholder="{{ $fechaHasta }}"/>
                &nbsp&nbsp&nbsp
            </div>
            <p style="float:left">&nbsp&nbsp&nbsp</p>
            <button style="float:left" type="submit" class="btn btn-primary">✔</button>
        </form>
    </div>

    <table class = 'table table-striped'> 
        <tr align="center">
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['page' => $page, 'sort' => 'fecha', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">
                    Fecha <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['page' => $page, 'sort' => 'hora', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">
                    Hora <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['page' => $page, 'sort' => 'direccion', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">
                    Ida/Vuelta <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['page' => $page, 'sort' => 'asientos', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">
                    Asientos <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['page' => $page, 'sort' => 'recogida', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">
                    Punto de Recogida <i class="fas fa-arrows-alt-v"></i>
                </a> 
            </th>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['page' => $page, 'sort' => 'localidad', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">
                    Localidad <i class="fas fa-arrows-alt-v"></i>
                </a> 
            </th>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['page' => $page, 'sort' => 'precio', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">
                    Precio <i class="fas fa-arrows-alt-v"></i>
                </a> 
            </th>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['page' => $page, 'sort' => 'uni', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">
                    Uni <i class="fas fa-arrows-alt-v"></i>
                </a> 
            </th>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['page' => $page, 'sort' => 'nombreCoche', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">
                    Coche <i class="fas fa-arrows-alt-v"></i>
                </a> 
            </th>
            <th> 
                <a href="{{ action('PasajeroController@misReservas',  ['page' => $page, 'sort' => 'nombre', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">
                    Conductor <i class="fas fa-arrows-alt-v"></i>
                </a> 
            </th>
            <th>
            </th>
        </tr>

        @foreach ($result as $r)
            <tr align="center">
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
                <td>
                    <form method="POST" action = "{{ action('PasajeroController@eliminarReserva', ['id_reserva'=>$r->id_reserva, 'correo_reserva'=>$r->correo_reserva, 'page' => $page, 'sort' => $sort, 'sort2' => $sort2,
                                                                                                    'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida]) }}">
                        @csrf
                        <button style="float:left" type="submit" class="btn btn-primary">❌</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </table>
    
    {{$result->appends(['page' => $page, 'sort' => $sort, 'sort2' => $sort2, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta, 'personaElegida'=>$personaElegida])->links()}}

@endsection