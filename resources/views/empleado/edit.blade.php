@extends('layouts.app')
@section('content')
    <div class="container">

        <form action="{{ url('/empleado/' . $empleado->id) }}" method="post" enctype="multipar/form-data">
            @csrf
            {{ method_field('PUT') }}
            @include('empleado.form', ['modo' => 'Editar']);

        </form>
    </div>
@endsection
