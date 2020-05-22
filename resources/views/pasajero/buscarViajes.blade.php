@extends(Auth::check() ? 'pasajero.master' : 'layouts.app', ['actual' => 0])

@section('content')
 
<div style="margin-left:150px;" class="col-md-8">
    <div class="card w-100 my-4 mx-5">
        <div class="card-header">
            
            @if ($reservado != null)
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <div style="margin-left:auto; margin-right:auto; text-align:center" class="alert alert-warning" role="alert">
                    <ul>
                        <li>{{ $reservado }}</li>
                    </ul>
                </div>
            @else
                <h1 style="text-align:center">Filtra tu búsqueda</h1>
            @endif
        </div>
        <div class="card-body">
            <form method="POST" action = "{{ action('PasajeroController@buscarViajes', ['page' => $page, 'sort' => 'fecha', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">
                @csrf
                <table style="margin-left:auto; margin-right:auto">
                    <tr>
                        <td width="33%">
                            <div style="margin-right: 50px;" class="form-group">
                                <label><i style="float:left" class="fas fa-calendar-week fa-2x"></i>&nbsp&nbsp Día: </label>               
                                <input type="date" name="dia" id="dia"  value="{{ $dia }}" class="form-control">
                            </div>
                        </td>
                        <td width=33% style="vertical-align: top">
                            <div style="margin-left: 50px;" class="datalist">
                                <label><i style="float:left" class="fas fa-map-marker-alt fa-2x"></i>&nbsp&nbsp Localidad: </label>
                                <input style="width:300px" type="text" list="localidades" class="form-control" name="localidad" value="{{ $localidad }}" placeholder="Localidad">
                                <datalist id="localidades">
                                    <option value="Todas"></option>
                                    @foreach($localidades as $loc)
                                    <option>{{$loc->localidad}}</option>
                                    @endforeach
                                </datalist>
                            </div>
                        </td>
                        <td width=33% style="horizontal-align: center; text-align:center">
                            <div class="form-group">
                                <label><i class="fas fa-map-signs fa-2x"></i>&nbsp&nbsp Ida/Vuelta: </label><br>
                                <select style="margin-left: 15%" id="direccion" name="direccion">
                                    <option value="ambas" @if ($direccion === "ambas") selected @endif>Ida/Vuelta</option>
                                    <option value="ida" @if ($direccion === "ida") selected @endif>Ida</option>
                                    <option value="vuelta"  @if ($direccion === "vuelta") selected @endif>Vuelta</option> 
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label><i style="float:left" class="fas fa-clock fa-2x"></i>&nbsp&nbsp Hora de salida: </label>
                                <br>
                                <input style="width:120px; display:inline-block" type="time" name="horaDesde" id="horaDesde" value="{{ $horaDesde }}" placeholder="Desde" class="form-control">
                                <input style="width:120px; display:inline-block" type="time" name="horaHasta" id="horaHasta" value="{{ $horaHasta }}" placeholder="Hasta" placeholder="Hasta" class="form-control">
                            </div>
                        </td>
                        <td style="vertical-align: top">
                            <div class="datalist" style="margin-left:50px">
                                <label><i style="float:left" class="fas fa-university fa-2x"></i>&nbsp&nbsp Universidad: </label>
                                <input style="width:300px" type="text" list="universidades" class="form-control" name="universidad" value="{{ $universidad }}" placeholder="Universidad">
                                <datalist id="universidades">
                                    <option value="Todas"></option>
                                    @foreach($universidades as $uni)
                                    <option>{{$uni->universidad}}</option>
                                    @endforeach
                                </datalist>
                            </div>
                        </td>
                        <td style="text-align:center">
                            <button style="margin-top: 25px; margin-left:30px; width:50%" type="submit" class="btn btn-primary"><i align="center" class="fas fa-search"></i> &nbsp&nbsp Buscar </button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
    
<div class="col-md-11">
    <div class="card w-100 my-4 mx-5">
        <div class="card-header">
            <h1 style="text-align:center">Búsqueda de viajes</h1>
        </div>
        <div class="card-body">
            <table class = "table table-striped">
                <tr align="center">
                    <th style="vertical-align: middle">
                        <a href="{{ action('PasajeroController@buscarViajes', ['page' => $page, 'sort' => 'fecha', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">
                            Fecha <i class="fas fa-arrows-alt-v"></i>
                        </a>
                    </th>
                    <th style="vertical-align: middle">
                        <a href="{{ action('PasajeroController@buscarViajes', ['page' => $page, 'sort' => 'hora', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">
                            Hora <i class="fas fa-arrows-alt-v"></i>
                        </a>
                    </th>
                    <th style="vertical-align: middle">
                        <a href="{{ action('PasajeroController@buscarViajes', ['page' => $page, 'sort' => 'direccion', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">
                            Ida/Vuelta <i class="fas fa-arrows-alt-v"></i>
                        </a>
                    </th>
                    <th style="vertical-align: middle">
                        <a href="{{ action('PasajeroController@buscarViajes', ['page' => $page, 'sort' => 'localidad', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">
                            Localidad <i class="fas fa-arrows-alt-v"></i>
                        </a>
                    </th>
                    <th style="vertical-align: middle">
                        <a href="{{ action('PasajeroController@buscarViajes', ['page' => $page, 'sort' => 'uni', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">
                            Uni <i class="fas fa-arrows-alt-v"></i>
                        </a>
                    </th>
                    <th style="vertical-align: middle">
                        <a href="{{ action('PasajeroController@buscarViajes', ['page' => $page, 'sort' => 'recogida', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">
                            Punto de <br> recogida <i class="fas fa-arrows-alt-v"></i>
                        </a>
                    </th>
                    <th style="vertical-align: middle">
                        <a href="{{ action('PasajeroController@buscarViajes', ['page' => $page, 'sort' => 'asientos', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">
                            Asientos <br> Disponibles <i class="fas fa-arrows-alt-v"></i>
                        </a>
                    </th>
                    <th style="vertical-align: middle">
                        <a href="{{ action('PasajeroController@buscarViajes', ['page' => $page, 'sort' => 'precio', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">
                            Precio <i class="fas fa-arrows-alt-v"></i>
                        </a>
                    </th>
                    <th style="vertical-align: middle">
                        <a href="{{ action('PasajeroController@buscarViajes', ['page' => $page, 'sort' => 'nombreCoche', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">
                            Coche <i class="fas fa-arrows-alt-v"></i>
                        </a>
                    </th>
                    <th style="vertical-align: middle">
                        <a href="{{ action('PasajeroController@buscarViajes', ['page' => $page, 'sort' => 'nombre', 'sort2' => $sort, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta]) }}">
                            Conductor <i class="fas fa-arrows-alt-v"></i>
                        </a>
                    </th>
                    <th style="vertical-align: middle">
                        Reservar
                    </th>
                </tr>
                
                @foreach ($result as $r)
                    <tr align="center">
                        <td style="vertical-align: middle">{{ $r->fecha }}</td>
                        <td style="vertical-align: middle">{{ $r->hora }}</td>
                        <td style="vertical-align: middle">{{ $r->direccion}}</td>
                        <td style="vertical-align: middle">{{ $r->localidad}}</td>
                        <td style="vertical-align: middle">{{ $r->uni}}</td>
                        <td style="vertical-align: middle">{{ $r->recogida}}</td>
                        <td style="vertical-align: middle">{{ $r->asientos}}</td> 
                        <td style="vertical-align: middle">{{ $r->precio}}€</td> 
                        <td style="vertical-align: middle">{{ $r->nombreCoche}}</td> 
                        <td style="vertical-align: middle">{{$r->nombre}} {{$r->apellido1}} {{$r->apellido2}}</td>
                        <td style="vertical-align: middle">
                            <form method="POST" action = "{{ action('PasajeroController@reservarViaje', ['page' => $page, 'slot_id'=>$r->slot_id]) }}">
                                @csrf
                                <div class="btn btn-primary">
                                    <input style="width:40px; margin-top:8px;" type="number" name="reservas" id="reservas" value="0"/>
                                    <button style="margin-left:5px; margin-bottom:5px;" type="submit" class="btn btn-success"> <i class="fas fa-shopping-cart"></i> </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="card-footer">
        {{$result->appends(['page' => $page, 'sort' => $sort, 'sort2' => $sort2, 'dia'=>$dia, 'localidad'=>$localidad, 'universidad'=>$universidad, 'direccion'=>$direccion, 'horaDesde'=>$horaDesde, 'horaHasta'=>$horaHasta])->links() }}
        </div>
    </div>
</div>

@endsection