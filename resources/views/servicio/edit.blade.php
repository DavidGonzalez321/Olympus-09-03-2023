@extends('layouts.app')
@section('content')
    <div class="container">

        <form action="{{ url('/servicio/' . $servicio->id) }}" method="post" enctype="multipar/form-data">
            @csrf
            {{ method_field('PUT') }}
            @include('servicio.form', ['modo' => 'Editar']);

        </form>
    </div>
@endsection
