<h1>{{$modo}} Existencias</h1>
@if(count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>

        @endforeach
    </ul>
</div>
@endif
<div class="form-group">
    <label for="Foto">Foto</label>
    @if(isset($Existencias->Foto))
    <img class="img-thumbnail img-fluid" src="{{asset('storage').'/'.$Existencias->Foto}}" width="100" alt="">
    @endif
    <input type="File" class="form-control" value="" name="Foto" id="Foto">
</div>
<br>
<div class="form-group">
    <label for="Nombre_Producto">Nombre_Producto</label>
    <input type="text" class="form-control" value="{{$Existencias->Nombre_Producto ?? '' }}" name="Nombre_Producto"
        id="Nombre_Producto">
</div>

<br>
<div class="form-group">
    <label for="Cantidad">Cantidad</label>
    <input type="text" class="form-control" value="{{$Existencias->Cantidad ?? '' }}" name="Cantidad" id="Cantidad">
</div>

<br>
<div class="form-group">
    <label for="Valor_Total">Valor_Total</label>
    <input type="text" class="form-control" value="{{$Existencias->Valor_Total ?? '' }}" name="Valor_Total"
        id="Valor_Total">
</div>

<br>
<div class="form-group">
    <label for="Fecha_Ingreso">Fecha_Ingreso</label>
    <input type="text" class="form-control" value="{{$Existencias->Fecha_Ingreso ?? '' }}" name="Fecha_Ingreso"
        id="Fecha_Ingreso">
</div>

<br>
<div class="form-group">
    <label for="Fecha_vencimiento">Fecha_vencimiento</label>
    <input type="text" class="form-control" value="{{$Existencias->Fecha_vencimiento ?? '' }}" name="Fecha_vencimiento"
        id="Fecha_vencimiento">
</div>

<br>
<div class="form-group">
    <label for="Ventas_Dia">Ventas_Dia</label>
    <input type="text" class="form-control" value="{{$Existencias->Ventas_Dia ?? '' }}" name="Ventas_Dia"
        id="Ventas_Dia">
</div>

<br>
<div class="form-goup">
    <label for="Ventas_Semana">Ventas_Semana</label>
    <input type="text" class="form-control" value="{{$Existencias->Ventas_Semana ?? '' }}" name="Ventas_Semana"
        id="Ventas_Semana">
</div>

<br>
<div class="form-group">
    <label for="Ventas_Mes">Ventas_Mes</label>
    <input type="text" class="form-control" value="{{$Existencias->Ventas_Mes ?? '' }}" name="Ventas_Mes"
        id="Ventas_Mes">
</div>

<br>
<div class="form-group">
    <label for="venta_Anual">venta_Anual</label>
    <input type="text" class="form-control" value="{{$Existencias->venta_Anual ?? '' }}" name="venta_Anual"
        id="venta_Anual">
</div>

<br>

<input class="btn btn-success" type="submit" value="{{$modo}} Datos Producto">
<a class="btn btn-dark" href="{{url('tienda/')}}">Regresar</a>
<br>