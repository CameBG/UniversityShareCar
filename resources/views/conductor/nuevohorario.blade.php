@extends('conductor.master', ['actual' => 0])

@section('content')

<h1> Crear un nuevo viaje </h1>
    
    <div style= "height:100px">
        <br><br>
        <div>
            <form method="POST" action="{{ action('ConductorController@nuevoHorario_crear') }}">
                @csrf
                <div class = "form-group row">
                    <label for="Fecha" class="col-sm2 col-form-label"> Fecha: </label>
                    <div class="col-sm-10">
                        <input type="text" name="fecha" id="fecha"  value="{{ old('fecha') }}"/>
                    </div>
                    
                </div>

                <div class = "form-group row">
                    <label for="Hora" class="col-sm2 col-form-label"> Hora: </label>
                    <div class="col-sm-10">
                        <input type="text" name="hora" id="hora"  value="{{ old('hora') }}"/>
                    </div>    
                </div>

                <div class = "form-group row">
                    <label for="direccion" class="col-sm2 col-form-label"> Dirección: </label>
                    <div class="col-sm-10">
                        <select id="direccion" name="direccion">
                            <option value="Ida">Ida</option>
                            <option value="Vuelta">Vuelta</option>
                        </select>
                    </div>
                </div>
                <div class = "form-group row">
                    <label for="coche" class="col-sm2 col-form-label"> Coches: </label>
                    <div class="col-sm-10">
                        <select id="coche" name="coche">
                            @foreach($coches as $coche)
                                <option> {{ $coche->matricula }} </option>
                            @endforeach
                        </select>
                    
                </div>
                <div>
                <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
            </div>
            
        </div>
        <div>
        {{--Error messages--}}
            @if (count($errors) > 0)
                <div style="float:left" class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    </div>
     
    </div>



@endsection