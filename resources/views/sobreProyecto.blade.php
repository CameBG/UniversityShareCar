@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <div class="col-md-8">
            <div class="card w-100 my-4 mx-5">
                <div class="card-header"><h1>Sobre UniversityCar</h1></div>
                    <div class="card-body">
                        <h4>Hay 2 tipos de usuario según lo que busques:</h4>

                        <br><br>

                        <div style="float:left">
                        <h2>Conductores</h2>
                        Si lo que buscas es colgar <br>
                        tu viaje para que la gente <br>
                        se una a ti, este es tu perfil.
                        </div>
                        <div style="float:right">
                        <h2>Pasajeros</h2>
                        Si lo que buscas es encontrar <br>
                        viajes a los que unirte, <br>
                        Este es tu perfil.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection