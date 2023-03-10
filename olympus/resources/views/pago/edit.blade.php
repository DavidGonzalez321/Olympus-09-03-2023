@extends('layouts.app')
@section('content')
<div class="container">

<form action="{{ url('/pago/'.$pago->id ) }}" method="post" enctype="multipar/form-data" >
@csrf
{{ method_field('PATCH') }}
@include('pago.form',['modo'=>'Editar']);

</form>
</div>
@endsection