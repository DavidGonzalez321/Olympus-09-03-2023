@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/servicio') }}" method="post" enctype="multipar/form-data" >
@csrf 
@include('servicio.form', ['modo'=>'Crear'] );


</form>
</div>
@endsection