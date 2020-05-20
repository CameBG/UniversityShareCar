@extends('conductor.master', ['actual' => 3])

@section('content')

    <h1> Listado de pasajeros asociados </h1>

    <div style="height:100px">
        <br><br>

        <form action = "{{ action('ConductorController@pasajeros',  ['page' => $page, 'sort' => $sort, 'sort2' => $sort2, 'cocheElegido'=>$cocheElegido, 'fechaElegida'=>$fechaElegida]) }}" method="POST">
            @csrf
            <div style="float:left" class="form-group row">
                <i style="float:left" class="fas fa-user fa-2x" class="col-sm-2 col-form-label"></i>
                <div class="col-sm-10">
                    <input type="text" name="personaElegida" id="personaElegida" value="{{ old('personaElegida') }}" placeholder="{{ $personaElegida }}"/>
                </div>
            </div>
            <p style="float:left">&nbsp&nbsp&nbsp</p>
            <button style="float:left" type="submit" class="btn btn-primary">✔</button>
        </form>

        <form style="float:right" action = "{{ action('ConductorController@pasajeros',  ['sort' => $sort, 'sort2' => $sort2, 'personaElegida'=>$personaElegida, 'cocheElegido'=>$cocheElegido]) }}" method="POST">
            @csrf
            <div style="float:left" class="form-group row">
                <i style="float:left" class="fas fa-calendar-week fa-2x" class="col-sm-2 col-form-label"></i>
                <div class="col-sm-10">
                    <input type="text" name="fechaElegida" id="fechaElegida" value="{{ old('fechaElegida') }}" placeholder="{{ $fechaElegida }}"/>
                </div>
            </div>
            <p style="float:left">&nbsp&nbsp&nbsp</p>
            <button style="float:left" type="submit" class="btn btn-primary">✔</button>
            <p style="float:left">&nbsp&nbsp&nbsp</p>
        </form>

        <p style="float:left">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>
        
        <div class="dropdown" style="float:left">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                Coches
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ action('ConductorController@pasajeros',  ['sort' => $sort, 'sort2' => $sort2, 'personaElegida'=>$personaElegida, 'cocheElegido'=>null, 'fechaElegida'=>$fechaElegida]) }}">Todos</a>
                @foreach($coches as $coche)
                    <a class="dropdown-item" href="{{ action('ConductorController@pasajeros',  ['sort' => $sort, 'sort2' => $sort2, 'personaElegida'=>$personaElegida, 'cocheElegido'=>$coche->nombreCoche, 'fechaElegida'=>$fechaElegida]) }}">{{ $coche->nombreCoche }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div>
        <table class = "table table-striped">
            <tr align="center">
                <th>
                    <a href="{{ action('ConductorController@pasajeros',  ['page' => $page, 'sort' => 'nombrePasajero', 'sort2' => $sort, 'personaElegida'=>$personaElegida, 'cocheElegido'=>$cocheElegido, 'fechaElegida'=>$fechaElegida]) }}">
                        Pasajero <i class="fas fa-arrows-alt-v"></i>
                    </a>
                </th>
                <th>
                    <a href="{{ action('ConductorController@pasajeros',  ['page' => $page, 'sort' => 'nombreCoche',    'sort2' => $sort, 'personaElegida'=>$personaElegida, 'cocheElegido'=>$cocheElegido, 'fechaElegida'=>$fechaElegida]) }}">
                        Coche <i class="fas fa-arrows-alt-v"></i>
                    </a>
                </th>
                <th>
                    <a href="{{ action('ConductorController@pasajeros',  ['page' => $page, 'sort' => 'asientos',       'sort2' => $sort, 'personaElegida'=>$personaElegida, 'cocheElegido'=>$cocheElegido, 'fechaElegida'=>$fechaElegida]) }}">
                        Asientos <i class="fas fa-arrows-alt-v"></i>
                    </a>
                </th>
                <th>
                    <a href="{{ action('ConductorController@pasajeros',  ['page' => $page, 'sort' => 'fecha',          'sort2' => $sort, 'personaElegida'=>$personaElegida, 'cocheElegido'=>$cocheElegido, 'fechaElegida'=>$fechaElegida]) }}">
                        Fecha <i class="fas fa-arrows-alt-v"></i>
                    </a>
                </th>
                <th>
                    <a href="{{ action('ConductorController@pasajeros',  ['page' => $page, 'sort' => 'hora',           'sort2' => $sort, 'personaElegida'=>$personaElegida, 'cocheElegido'=>$cocheElegido, 'fechaElegida'=>$fechaElegida]) }}">
                        Hora <i class="fas fa-arrows-alt-v"></i>
                    </a>
                </th>
                <th>
                    <a href="{{ action('ConductorController@pasajeros',  ['page' => $page, 'sort' => 'direccion',      'sort2' => $sort, 'personaElegida'=>$personaElegida, 'cocheElegido'=>$cocheElegido, 'fechaElegida'=>$fechaElegida]) }}">
                        Dirección <i class="fas fa-arrows-alt-v"></i>
                    </a>
                </th>
            </tr>
            @foreach($filas as $fila)
            <tr align="center">
                <td>{{ $fila->nombrePasajero }}</td>
                <td>{{ $fila->nombreCoche }}</td>
                <td>{{ $fila->asientos }}</td>
                <td>{{ $fila->fecha }}</td>
                <td>{{ $fila->hora}}</td>
                <td>{{ $fila->direccion }}</td>
            </tr>
            @endforeach
        </table>

        {{ $filas->appends(['page' => $page, 'sort'=>$sort, 'sort2'=>$sort2, 'personaElegida'=>$personaElegida, 'cocheElegido'=>$cocheElegido, 'fechaElegida'=>$fechaElegida])->links() }}

        {{--Error messages--}}
        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection