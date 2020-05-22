@extends('layouts.app', ['actual' => 0])

@section('content')
<div class="container">
    <div class="col-md-10">
        <div class="card w-100 my-4 mx-5">
            <div class="card-header">
                <h1 style="text-align:center">UniversityCar</h1>
            </div>
            <div class="card-body">
                <h4>Con esta web vas a poder compartir tus viajes a la universidad.</h4>
                <br><br>
                <h4>Te ayudaremos a:
                    <br>
                    <br>
                    <ul>                  
                        <li>&nbsp&nbsp&nbsp&nbsp-Reducit costes innecesarios</li>
                        <li>&nbsp&nbsp&nbsp&nbsp-Reducir el tiempo del viaje</li>
                        <li>&nbsp&nbsp&nbsp&nbsp-Encontrar un medio de transporte de forma cómoda y sencilla</li>
                    </ul>
                </h4>
            </div>
        </div>
    </div>
    <div class="col-md-10">
        <div class="card w-100 my-4 mx-5">
            <div class="card-header">
                <h1 style="text-align:center">¡Explora en los viajes!</h1>
            </div>
            <div class="card-body">
                <h4>Realiza una búsqueda para ir con alguien a la universidad haciendo click aquí.</h4>
                <br>
                <form align="center" method="GET" action ="{{ action('PasajeroController@buscarViajes') }}">
                    @csrf
                    <button style="margin-right:10px" type="submit" class="btn btn-primary"><i class="fas fa-search"></i>  Realizar búsqueda de viajes.</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
