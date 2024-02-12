@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{url('/tienda/'.$Existencias->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    {{method_field('PATCH')}}
    @include('tienda.form',['modo'=>'Editar']);

</form>
</div>
@endsection