@php
    $tiposPago = ['Efectivo Dolares', 'Efectivo Bolivares', 'Punto de venta', 'Transferencia', 'Pago movil', 'Zelle', 'Paypal', 'Criptomoneda', 'Mixto', 'Otros'];
@endphp

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
        <h1 style="color: black">{{ $modo }} Pago de Servicio</h1>
    </center>

    <br>
    <br>

    <div class="form-group">
        {{ Form::label('Cliente') }}
        {{ Form::select('cliente_id', $clientes, $pago->cliente_id, [
            'class' => 'form-control' . ($errors->has('cliente_id') ? ' is-invalid' : ''),
            'placeholder' => 'Clientes',
        ]) }}
        {!! $errors->first('cliente_id', '<div class="invalid-feedback">:message</div>') !!}
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>


    <div class="form-gropu">
        {{ Form::label('Barbero') }}
        {{ Form::select('empleado_id', $empleados, $pago->empleado_id, [
            'class' => 'form-control' . ($errors->has('empleado_id') ? ' is-invalid' : ''),
            'placeholder' => 'Barberos',
        ]) }}
        {!! $errors->first('empleado_id', '<div class="invalid-feedback">:message</div>') !!}
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-group">
        <label for="Servicio">Servicio</label>
        <select class="js-example-basic-multiple form-control select2" name="servicios[]" id="servicios[]"
            multiple="multiple">
            <option hidden disabled selected value="0">Servicio</option>
            @foreach ($servicios as $index => $servicio)
                @if (Route::is('pago.create'))
                    <option value="{{ $servicio['id'] }}">
                        {{ $servicio['Descripcion'] . ' ' . $servicio['Costo'] }}
                    </option>
                @else
                    @foreach ($pago->servicios as $pagoServicio)
                        <option value="{{ $servicio['id'] }}"
                            {{ $servicio['id'] === $pagoServicio['id'] ? 'selected' : '' }}>
                            {{ $servicio['Descripcion'] . ' ' . $servicio['Costo'] }}
                        </option>
                    @endforeach
                @endif
            @endforeach
        </select>
        <p style="color: gray">*Campo Obligatorio</p>
    </div>



    <div class="form-group">
        <label for="Tipo de pago"> Tipo de pago </label>
        <select type="text" class="form-control" name="TipodePago" id="TipodePago">

            <option value="0" readonly></option>

            @foreach ($tiposPago as $tipo)
                <option {{ $pago->TipodePago === $tipo ? 'selected' : '' }}>{{ $tipo }}</option>
            @endforeach
        </select>
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-group">
        <label for="REF"> REF </label>
        <input type="text" class="form-control" name="REF"
            value="{{ isset($pago->REF) ? $pago->REF : old('REF') }}" id="REF" />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>



    <a style="width: 40px; height:40px ;" class="btn btn-primary" href="{{ url('pago/') }}">
        <i class="fa-solid fa-rotate-left" style="position: absolute; margin-left: -7px; margin-top: 5px"></i>
    </a>

    <i class="fa-regular fa-circle-check" style="position: absolute; margin-left: 12px; margin-top: 12px"></i>
    <input style="width: 40px; height:40px " class="btn btn-success" type="submit" value="" />

</div>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
