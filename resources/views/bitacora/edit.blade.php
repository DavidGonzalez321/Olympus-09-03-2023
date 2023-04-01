@extends('layouts.app')
@section('content')
    <div class="container">

        <form action="{{ url('/cliente/' . $cliente->id) }}" method="post" enctype="multipar/form-data">
            @csrf
            {{ method_field('PUT') }}
            @include('cliente.form', ['modo' => 'Editar']);

        </form>
    </div>
@endsection
