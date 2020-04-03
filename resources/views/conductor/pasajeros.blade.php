@extends('conductor.master')

@section('content')

    <h1> Listado de pasajeros asociados </h1>

    <div style="height:100px">
        <br><br>

        <form action = "{{ action('ConductorController@pasajeros',  ['sort' => $sort, 'sort2' => $sort2, 'cocheElegido'=>$cocheElegido, 'fechaElegida'=>$fechaElegida]) }}" method="POST">
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
            <tr>
                <th>
                    <a href="{{ action('ConductorController@pasajeros',  ['sort' => 'nombrePasajero', 'sort2' => $sort, 'personaElegida'=>$personaElegida, 'cocheElegido'=>$cocheElegido, 'fechaElegida'=>$fechaElegida]) }}">Pasajero</a>
                </th>
                <th>
                    <a href="{{ action('ConductorController@pasajeros',  ['sort' => 'nombreCoche',    'sort2' => $sort, 'personaElegida'=>$personaElegida, 'cocheElegido'=>$cocheElegido, 'fechaElegida'=>$fechaElegida]) }}">Coche</a>
                </th>
                <th>
                    <a href="{{ action('ConductorController@pasajeros',  ['sort' => 'asientos',       'sort2' => $sort, 'personaElegida'=>$personaElegida, 'cocheElegido'=>$cocheElegido, 'fechaElegida'=>$fechaElegida]) }}">Asientos</a>
                </th>
                <th>
                    <a href="{{ action('ConductorController@pasajeros',  ['sort' => 'fecha',          'sort2' => $sort, 'personaElegida'=>$personaElegida, 'cocheElegido'=>$cocheElegido, 'fechaElegida'=>$fechaElegida]) }}">Fecha</a>
                </th>
                <th>
                    <a href="{{ action('ConductorController@pasajeros',  ['sort' => 'hora',           'sort2' => $sort, 'personaElegida'=>$personaElegida, 'cocheElegido'=>$cocheElegido, 'fechaElegida'=>$fechaElegida]) }}">Hora</a>
                </th>
                <th>
                    <a href="{{ action('ConductorController@pasajeros',  ['sort' => 'direccion',      'sort2' => $sort, 'personaElegida'=>$personaElegida, 'cocheElegido'=>$cocheElegido, 'fechaElegida'=>$fechaElegida]) }}">Dirección</a>
                </th>
            </tr>
            @foreach($filas as $fila)
            <tr>
                <td>{{ $fila->nombrePasajero }}</td>
                <td>{{ $fila->nombreCoche }}</td>
                <td>{{ $fila->asientos }}</td>
                <td>{{ $fila->fecha }}</td>
                <td>{{ $fila->hora}}</td>
                <td>{{ $fila->direccion }}</td>
            @endforeach
        </table>

        {{ $filas->appends(['sort'=>$sort, 'sort2'=>$sort2, 'personaElegida'=>$personaElegida, 'cocheElegido'=>$cocheElegido, 'fechaElegida'=>$fechaElegida])->links() }}

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