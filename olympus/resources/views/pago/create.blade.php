@extends('layouts.app')
@section('content'))
<div class="container">

<form action="{{ route('pago.store') }}" method="post" enctype="multipar/form-data" >
@csrf 
@include('pago.form', ['modo'=>'Crear'] );


</form>
</div>
@endsection