@extends('layouts.app', ['actual' => 2])

@section('content')
<div class="container">
    <div>
        <div class="col-md-6">
            <div class="card w-100 my-4 mx-5">
                <div class="card-header"><h1>Contacta con nosotros</h1></div>  
                    <ul class="list-group">
                        <li class="list-group-item"><i class = "fas fa-map-marker-alt"></i> San Vicente del Raspeig UA</li>
                        <li class="list-group-item"><i class = "fas fa-phone"></i> 612 345 678</li>
                        <li class="list-group-item"><i class = "fas fa-envelope"></i> universitycar@gmail.com</li>
                        <li class="list-group-item"><i class = "fab fa-twitter"></i> twitter.com/universityCar</li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection