@if (count($errors) > 0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

@section('css')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection


<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg col-8">
    <center>
        <h1 style="color: black">{{ $modo }} Cita</h1>
    </center>

    <div class="form-group">
        {{ Form::label('Cliente') }}
        {{ Form::select('clientes_CI', $clientes, $cita->clientes_CI, ['class' => 'form-control' . ($errors->has('cliente_CI') ? ' is-invalid' : '')]) }}
        {!! $errors->first('clientes_CI', ' <div class="invalid-feedback">:message</div> ') !!}
        <p style="color: gray;">*Campo Obligatorio</p>

    </div>

    <div class="form-group">
        {{ Form::label('Servicio') }}
        {{ Form::select('servicios[]', $servicios, $cita->servicios_Cod, ['multiple' => 'multiple', 'class' => 'form-control' . ($errors->has('servicios_Cod') ? ' is-invalid' : '')]) }}
        {!! $errors->first('servicios_Cod', ' <div class="invalid-feedback">:message</div> ') !!}
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-group">
        {{ Form::label('Empleado') }}
        {{ Form::select('empleados_CI', $empleados, $cita->empleados_CI, ['class' => 'form-control' . ($errors->has('empleado_CI') ? ' is-invalid' : '')]) }}
        {!! $errors->first('empleado_CI', ' <div class="invalid-feedback">:message</div> ') !!}
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-gropu">
        <label for="Fecha"> Fecha </label>
        <input type="date" class="form-control" name="Fecha"
            value="{{ isset($cita->Fecha) ? $cita->Fecha : old('Fecha') }}" id="Fecha" />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-gropu">
        <label for="Hora"> Hora </label>
        <input type="time" class="form-control" name="Hora"
            value="{{ isset($cita->Hora) ? $cita->Hora : old('Hora') }}" id="Hora" />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <a style="width: 40px; height: 40px" class="btn btn-primary" href="{{ url('cita/') }}">
        <i class="fa-solid fa-rotate-left" style="position: absolute; margin-left: -7px; margin-top: 5px"></i>
    </a>

    <i class="fa-regular fa-circle-check" style="position: absolute; margin-left: 12px; margin-top: 12px"></i>
    <input style="width: 40px; height: 40px" class="btn btn-success" type="submit" value="" />
    <br />
</div>

@section('js')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection
