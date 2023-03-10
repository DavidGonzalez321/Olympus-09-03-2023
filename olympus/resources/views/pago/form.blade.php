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
        <h1 style="color: black">{{ $modo }} Pago</h1>
    </center>

    <div class="form-group">
        {{ Form::label('Servicio') }}
        {{ Form::select('servicios[]', $servicios, $pago->servicios_Cod, ['multiple' => 'multiple', 'class' => 'form-control' . ($errors->has('servicios_Cod') ? ' is-invalid' : '')]) }}
        {!! $errors->first('servicios_Cod', ' <div class="invalid-feedback">:message</div> ') !!}
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>
    
    <div class="form-gropu">
        <label for="Tipo de pago"> Tipo de pago </label>
        <select type="text" class="form-control" name="TipodePago"
            value="{{ isset($pago->TipodePago) ? $pago->TipodePago : old('TipodePago') }}" id="TipodePago">
            <option>Efectivo Dolares</option>
            <option>Efectivo Bolivares</option>
            <option>Punto de Venta</option>
            <option>Transferencia</option>
            <option>Pago movil</option>
            <option>Zelle</option>
            <option>Paypal</option>
            <option>Criptomoneda</option>
            <option>Mixto</option>
            <option>Otros</option>
        </select>
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-gropu">
        <label for="REF"> REF </label>
        <input type="text" class="form-control" name="REF"
            value="{{ isset($pago->REF) ? $pago->REF : old('REF') }}" id="REF" />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-gropu">
        {{ Form::label('Empleado') }}
        {{ Form::select('empleados_CI', $empleados, $pago->empleados_CI, ['class' => 'form-control' . ($errors->has('empleado_CI') ? ' is-invalid' : '')]) }}
        {!! $errors->first('empleado_CI', '<div class="invalid-feedback">:message</div>') !!}
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-group">
        {{ Form::label('Cliente') }}
        {{ Form::select('clientes_CI', $clientes, $pago->clientes_CI, ['class' => 'form-control' . ($errors->has('cliente_CI') ? ' is-invalid' : '')]) }}
        {!! $errors->first('cliente_CI', '<div class="invalid-feedback">:message</div>') !!}
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <a style="width: 40px; height:40px ;"class="btn btn-primary" href="{{ url('pago/') }}">
        <i class="fa-solid fa-rotate-left" style="position: absolute; margin-left: -7px; margin-top: 5px"></i>
    </a>

    <i class="fa-regular fa-circle-check" style="position: absolute; margin-left: 12px; margin-top: 12px"></i>
    <input style="width: 40px; height:40px " class="btn btn-success" type="submit" value="" />

</div>
