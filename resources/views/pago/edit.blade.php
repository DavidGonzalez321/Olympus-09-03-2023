@extends('layouts.app')
@section('content')
    <div class="container">

        <form action="{{ url('/pago/' . $pago->id) }}" method="post">
            @csrf
            {{ method_field('PUT') }}

            @include('pago.form', ['modo' => 'Editar']);
        </form>
    </div>
@endsection
