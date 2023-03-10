@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/cita/'.$cita->id ) }}" method="post" enctype="multipar/form-data" >
@csrf
{{ method_field('PATCH') }}
@include('cita.form',['modo'=>'Editar']);

</form>
</div>
@endsection