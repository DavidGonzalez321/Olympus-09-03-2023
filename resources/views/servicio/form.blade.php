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
        <h1 style="color: black">{{ $modo }} Servicio</h1>
    </center>

    <br>
    <br>

    <div class="form-group">
        <label for="Cod"> Codigo </label>
        <input type="text" class="form-control" name="Cod" placeholder="0000"
            value="{{ isset($servicio->Cod) ? $servicio->Cod : old('Cod') }}" id="Cod" />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-group">
        <label for="Descripcion"> Descripción </label>
        <input type="text" class="form-control" name="Descripcion" placeholder="Descripción"
            value="{{ isset($servicio->Descripcion) ? $servicio->Descripcion : old('Descripcion') }}"
            id="Descripcion" />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-gropu">
        <label for="Costo"> Costo$ </label>
        <input type="number" class="form-control" name="Costo" placeholder="0.00"
            value="{{ isset($servicio->Costo) ? $servicio->Costo : old('Costo') }}" id="Costo" />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>


    <a style="width: 40px; height: 40px" class="btn btn-primary" href="{{ url('servicio/') }}">
        <i class="fa-solid fa-rotate-left" style="position: absolute; margin-left: -7px; margin-top: 5px"></i>
    </a>

    <i class="fa-regular fa-circle-check" style="position: absolute; margin-left: 12px; margin-top: 12px"></i>
    <input style="width: 40px; height: 40px" class="btn btn-success" type="submit" value="" />
    <br />
</div>
