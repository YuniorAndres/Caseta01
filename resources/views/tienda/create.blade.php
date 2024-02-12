@extends('layouts.app')

@section('content')
<div class="container">

    <form action="{{url('/tienda')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('tienda.form', ['modo'=>'Crear']);
    </form>
</div>
@endsection