@extends('conductor.master', ['actual' => 1])

@section('content')

    <h1> Edicición de Coches </h1>

    <div style= "margin-left:33%">

        <form method="POST" action = "{{ action('ConductorController@coches_modificado', ['matricula'=>$coche->matricula]) }}" enctype="multipart/form-data">
            @csrf
            <table>
                <tr height="50px">
                    <td colspan="2">
                        <label style="float:left" for="nombre" >Nombre: &nbsp&nbsp</label>
                        <input style="float:left" type="text" name="nombre" id="nombre" value="{{ $coche->nombre }}"/>
                    </td>
                </tr>

                <tr>
                    <td rowspan="5" width="320px" height="20px">
                        @if (isset($coche->rutaImagen))
                            <img src="/images/{{ $coche->rutaImagen }}" width="300px" height="auto">
                        @else
                            <img src="/images/default.jpg" width="300px" height="auto">
                        @endif
                    </td>
                    <td>
                        <label style="float:left" for="matricula" >Matrícula: &nbsp&nbsp</label>
                        <label style="float:rigth" for="matricula" ><b>{{ $coche->matricula }}</b></label>
                    </td>
                </tr>

                <tr>
                    <td>
                    <label style="float:left" for="marca" >Marca: &nbsp&nbsp</label>
                        <input style="float:right" type="text" name="marca" id="marca" value="{{ $coche->marca }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label style="float:left" for="modelo" >Modelo: &nbsp&nbsp</label>
                        <input style="float:right" type="text" name="modelo" id="modelo" value="{{ $coche->modelo }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label style="float:left" for="plazas" >Plazas: &nbsp&nbsp</label>
                        <input style="float:right" type="text" name="plazas" id="plazas" value="{{ $coche->plazas }}"/>
                    </td>
                </tr>
                <tr>
                    <td>
                    <label style="float:left" for="precio" >Precio/Viaje: &nbsp&nbsp</label>
                        <input style="float:right" type="text" name="precio" id="precio" value="{{ $coche->precioViaje }}"/>
                    </td>
                </tr>
            </table>

            <br>

            <div style="float:left">
                Editar imagen:
                <br>
                <input name="imagen" id="imagen" type="file" accept="image/jpeg, image/png"/>
            </div>
            <div style="float:right; margin-right:50%">
                <br>
                <button type="submit" class="btn btn-primary">Guardar ✔</button>
            </div>
        </form>

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
@endsection