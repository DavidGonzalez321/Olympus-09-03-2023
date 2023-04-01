@if (count($errors) > 0)

    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg col-8">

    <center>
        <h1 style="color: black">{{ $modo }} Horario</h1>
    </center>

    <br>
    <br>


    <div class="form-gropu">
        {{ Form::label('Barbero') }}
        {{ Form::select('empleado_id', $empleados, $horario->empleado_id, [
            'class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : ''),
            'placeholder' => 'Ej:Francisco',
        ]) }}
        {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-gropu">
        <label for="Fecha"> Fecha </label>
        <input type="date" class="form-control" name="Fecha" placeholder="01/01/1999"
            value="{{ isset($cita->Fecha) ? $cita->Fecha : old('Fecha') }}" id="Fecha" />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-group">
        <label for="Entrada"> Hora de Entrada </label>
        <input type="time" class="form-control" name="Entrada" placeholder="12:00 AM"
            value="{{ isset($horario->Entrada) ? $horario->Entrada : old('Entrada') }}" id="Entrada" />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-gropu">
        <label for="Salida"> Hora de Salida </label>
        <input type="time" class="form-control" name="Salida" placeholder="12:00 AM"
            value="{{ isset($horario->Salida) ? $horario->Salida : old('Salida') }}" id="Salida" />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>


    <a style="width: 40px; height:40px ;"class="btn btn-primary" href="{{ url('horario/') }}">
        <i class="fa-solid fa-rotate-left" style="position: absolute; margin-left: -7px; margin-top: 5px"></i>
    </a>

    <i class="fa-regular fa-circle-check" style="position: absolute; margin-left: 12px; margin-top: 12px"></i>
    <input style="width: 40px; height:40px " class="btn btn-success" type="submit" value="" />

</div>
