@extends('layouts.app')
@section('content')
    <div class="container">

        <form action="{{ url('/cita') }}" method="post" enctype="multipar/form-data" >
            @csrf
            @include('cita.form', ['modo' => 'Crear']);

            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
        </form>
    </div>
@endsection
