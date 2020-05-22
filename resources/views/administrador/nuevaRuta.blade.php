@extends('administrador.master', ['actual' => 1])

@section('content')

<h1> Crear una nueva ruta </h1>
    
    <div style= "height:100px">
        <br><br>
        <div>
            <form method="POST" action="{{ action('AdministradorController@nuevaRuta_crear') }}">
                @csrf


                <div class = "form-group row">
                    <label for="localidad" class="col-sm2 col-form-label"> Localidad: </label>
                    <div class="col-sm-10">
                        <input type="text" name="localidad" id="localidad"/>
                    </div>    
                </div>

                <div class = "form-group row">
                    <label for="universidad" class="col-sm2 col-form-label"> Universidad: </label>
                    <div class="col-sm-10">
                        <input type="text" name="universidad" id="universidad"/>
                    </div>
                    
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