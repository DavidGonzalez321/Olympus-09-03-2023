@extends('layouts.app')
@section('content')
    <div class="container">

        <form action="{{ url('/horario/' . $horario->id) }}" method="post" enctype="multipar/form-data">
            @csrf
            {{ method_field('PUT') }}
            @include('horario.form', ['modo' => 'Editar']);

        </form>
    </div>
@endsection
