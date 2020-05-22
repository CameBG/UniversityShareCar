@extends('conductor.master', ['actual' => 0])

@section('content')

    <script type= "text/javascript">
        function ConfirmDelete(){
            var respuesta = confirm("Si eliminas el viaje los pasajeros serán desasignados. ¿Estás seguro?");

            if (respuesta){
                return true;
            }
            else{
                return false;
            }
        }
    </script>

    <h1> Mis horarios </h1>
    
    <div style="height:100px">
        <br><br>
        <form method="POST" action = "{{ action('ConductorController@misHorarios',  ['page' => $page, 'sort' => $sort, 'sort2' => $sort2, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta]) }}">
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
            <button style="float:left" type="submit" class="btn btn-primary"><i  class="fas fa-check"> </i></button>
        </form>

    <form style="float:right" method="GET" action ="{{ action('ConductorController@nuevoHorario') }}">
            @csrf
            <div style="float:left" class="form-group row">
                <label for="viajeNuevo">Nuevo Viaje</label>
                &nbsp&nbsp&nbsp
            </div>
            <p style="float:left">&nbsp&nbsp&nbsp</p>
            <button style="float:left" type="submit" class="btn btn-primary"><i  class="fas fa-plus"> </i></button>
            <p style="float:left">&nbsp&nbsp&nbsp</p>
        </form>
        
    </div>
    <table class = 'table table-striped'> 
        <tr align="center">
            <th> 
                <a href="{{ action('ConductorController@misHorarios',  ['page' => $page, 'sort' => 'fecha', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta]) }}">
                    Fecha <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th> 
                <a href="{{ action('ConductorController@misHorarios',  ['page' => $page, 'sort' => 'hora', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta]) }}">
                    Hora <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th> 
                <a href="{{ action('ConductorController@misHorarios',  ['page' => $page, 'sort' => 'direccion', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta]) }}">
                    Ida/Vuelta <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th> 
                <a href="{{ action('ConductorController@misHorarios',  ['page' => $page, 'sort' => 'nombreCoche', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta]) }}">
                    Coche <i class="fas fa-arrows-alt-v"></i>
                </a>
            </th>
            <th> 
                <a href="{{ action('ConductorController@misHorarios',  ['page' => $page, 'sort' => 'asientos', 'sort2' => $sort, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta]) }}">
                    Pasajeros <i class="fas fa-arrows-alt-v"></i>
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
                <td>{{$r->nombreCoche}}</td>
                <td>{{$r->asientos}}/{{$r->plazas}}</td>
                <td>
                    <form method="POST" action ="{{ action('ConductorController@borrarHorario',  ['id_elegido'=>$r->id_elegido]) }}">
                        @csrf
                        <button onclick="return ConfirmDelete()" style="float:left" type="submit" class="btn btn-primary">❌</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
    
    {{$result->appends(['page' => $page, 'sort' => $sort, 'sort2' => $sort2, 'fechaDesde'=>$fechaDesde, 'fechaHasta'=>$fechaHasta])->links()}}

    

@endsection