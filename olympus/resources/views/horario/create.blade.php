@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/horario') }}" method="post" enctype="multipar/form-data" >
@csrf 
@include('horario.form', ['modo'=>'Crear'] );


</form>
</div>
@endsection