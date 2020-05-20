@extends('pasajero.master')

@section('content')
    <h1> Buscar Viajes </h1>
    <div >
        <br><br>
        <form style="width:400px" method="POST" action = "{{ action('PasajeroController@buscarViajes', ['sort' => 'fecha', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">
            @csrf
            <div class="form-group">
                <label><i style="float:left" class="fas fa-calendar-week fa-2x"></i>&nbsp&nbsp Día: &nbsp&nbsp </label>               
                <input type="text" name="dia" id="dia" placeholder="YYYY-MM-DD" class="form-control">
            </div>
            <div class="form-group">
                <label><i style="float:left" class="fas fa-clock fa-2x"></i>&nbsp&nbsp Hora de salida. Formato (HH:mm:ss) &nbsp&nbsp</label>
                
                <input type="text" name="horaDesde" id="horaDesde" placeholder="Desde" class="form-control">
                
                <input type="text" name="horaHasta" id="horaHasta" placeholder="Hasta" class="form-control">               
            </div>
            <div class="form-group">
                <label><i style="float:left" class="fas fa-map-marker-alt fa-2x"></i>&nbsp&nbsp Localidad: </label>
                <input type="text" class="form-control" name="localidad" id="localidad">
            </div>
            <div class="form-group">
                <label><i style="float:left" class="fas fa-university fa-2x"></i>&nbsp&nbsp Universidad: </label>
                <input type="text" class="form-control" name="universidad" id="universidad">
            </div>
            <div class="form-group">
                <label><i style="float:left" class="fas fa-map-signs fa-2x"></i>&nbsp&nbsp Ida/Vuelta: &nbsp</label>
                <select id="direccion" name="direccion">
                    <option value="ida">Ida</option>
                    <option value="vuelta">Vuelta</option>
                    <option value="ambas">Ida/Vuelta</option>
                </select>
            </div>
            <p style="float:left">&nbsp&nbsp&nbsp</p>
            <button type="submit" class="btn btn-primary"><i style="float:left" class="fas fa-search"></i> &nbsp&nbsp Buscar </button>
        </form>
    </div>
    <br>
    <div>
        <table class = "table table-striped">
            <thead>
                <tr>
                    <th>
                    <a href="{{ action('PasajeroController@buscarViajes', ['sort' => 'fecha', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">Fecha</a>
                    </th>
                    <th>
                    <a href="{{ action('PasajeroController@buscarViajes', ['sort' => 'hora', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">Hora</a>
                    </th>
                    <th>
                    <a href="{{ action('PasajeroController@buscarViajes', ['sort' => 'direccion', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">Ida/Vuelta</a>
                    </th>
                    <th>
                    <a href="{{ action('PasajeroController@buscarViajes', ['sort' => 'localidad', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">Localidad</a>
                    </th>
                    <th>
                    <a href="{{ action('PasajeroController@buscarViajes', ['sort' => 'uni', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">Uni</a>
                    </th>
                    <th>
                    <a href="{{ action('PasajeroController@buscarViajes', ['sort' => 'recogida', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">Punto de recogida</a>
                    </th>
                    <th>
                    <a href="{{ action('PasajeroController@buscarViajes', ['sort' => 'asientos', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">Asientos Disponibles/Total</a>
                    </th>
                    <th>
                    <a href="{{ action('PasajeroController@buscarViajes', ['sort' => 'precio', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">Precio</a>
                    </th>
                    <th>
                    <a href="{{ action('PasajeroController@buscarViajes', ['sort' => 'nombreCoche', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">Coche</a>
                    </th>
                    <th>
                    <a href="{{ action('PasajeroController@buscarViajes', ['sort' => 'nombre', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">Conductor</a>
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($result as $r)
                    <tr>
                        <td>{{ $r->fecha }}</td>
                        <td>{{ $r->hora }}</td>
                        <td>{{ $r->direccion}}</td>
                        <td>{{ $r->localidad}}</td>
                        <td>{{ $r->uni}}</td>
                        <td>{{ $r->recogida}}</td>
                        <td>{{ $r->asientos}}/{{ $r->plazas}}</td> 
                        <td>{{ $r->precio}}€</td> 
                        <td>{{ $r->nombreCoche}}</td> 
                        <td>{{$r->nombre}} {{$r->apellido1}} {{$r->apellido2}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$result->appends(['sort' => $sort, 'sort2' => $sort2, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta])->links() }}
    </div>
@endsection