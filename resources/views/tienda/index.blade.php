@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('mensaje'))
    <div class="alert alert-succes alert-dismissible fade show" role="alert">

        {{Session::get('mensaje')}}

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
    </div>
    @endif

    <a href="{{url('tienda/create')}}" class="btn btn-success">Registrar Un Nuevo Producto</a>
    <table class="table table-light">
        <thead class="thead-light">
            <th>#</th>
            <th>Foto</th>
            <th>Nombre_Producto</th>
            <th>Cantidad</th>
            <th>Valor_Total</th>
            <th>Fecha_Ingreso</th>
            <th>Fecha_vencimiento</th>
            <th>Ventas_Dia</th>
            <th>Ventas_Semana</th>
            <th>Ventas_Mes</th>
            <th>venta_Anual</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach($Existencias as $Existencias)
            <tr>
                <td>{{$Existencias->id }}</td>
                <td>
                    <img src="{{ asset('storage').'/'.$Existencias->Foto}}" width="100" alt="">
                </td>
                <td>{{$Existencias->Nombre_Producto }}</td>
                <td>{{$Existencias->Cantidad }}</td>
                <td>{{$Existencias->Valor_Total }}</td>
                <td>{{$Existencias->Fecha_Ingreso }}</td>
                <td>{{$Existencias->Fecha_vencimiento }}</td>
                <td>{{$Existencias->Ventas_Dia }}</td>
                <td>{{$Existencias->Ventas_Semana }}</td>
                <td>{{$Existencias->Ventas_Mes }}</td>
                <td>{{$Existencias->venta_Anual }}</td>
                <td><a href="{{url('/tienda/'.$Existencias->id.'/edit')}}" class="btn btn-warning">Editar</a>|
                    <form action="{{url('/tienda/'.$Existencias->id)}}" class="d-inline-block" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" onclick="return confirm('¿quieres Borrar?')"
                            value="Borrar">
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection