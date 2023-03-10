

@if(count($errors)>0)

<div class="alert alert-danger" role="alert">
    <ul>
        @foreach( $errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@endif

<div
    class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg col-8"
>

<center>
        <h1 style="color: black">{{ $modo }} Empleado</h1>
    </center>

 <div class="form-group">
        <label for="CI"> CI </label>
        <input
            type="text"
            class="form-control"
            name="CI"
            value="{{ isset($empleado->CI)?$empleado->CI:old('CI')  }}"
            id="CI"
        />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>   
    
    <div class="form-group">
        <label for="Nombres"> Nombre </label>
        <input
            type="text"
            class="form-control"
            name="Nombres"
            value="{{ isset($empleado->Nombres)?$empleado->Nombres:old('Nombres')  }}"
            id="Nombres"
        />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-gropu">
        <label for="Apellidos"> Apellidos </label>
        <input
            type="text"
            class="form-control"
            name="Apellidos"
            value="{{ isset($empleado->Apellidos)?$empleado->Apellidos:old('Apellidos') }}"
            id="Apellidos"
        />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>
    
    <div class="form-gropu">
        <label for="Cargo"> Cargo </label>
        <select
            type="text"
            class="form-control"
            name="Cargo"
            value="{{ isset($empleado->Cargo)?$empleado->Cargo:old('Cargo') }}"
            id="Cargo"
        >
            <option>Barbero</option>
            <option>Administrador@</option>
            <option>Personal de Mantenimiento</option>
        </select>
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-gropu">
        <label for="Correo"> Correo </label>
        <input
            type="email"
            class="form-control"
            name="Correo"
            value="{{ isset($empleado->Correo)?$empleado->Correo:old('Correo') }}"
            id="Correo"
        />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

    <div class="form-gropu">
        <label for="Telefono"> Telefono </label>
        <input
            type="text"
            class="form-control"
            name="Telefono"
            value="{{ isset($empleado->Telefono)?$empleado->Telefono:old('Telefono') }}"
            id="Telefono"
        />
        <p style="color: gray;">*Campo Obligatorio</p>
    </div>

   <a style="width: 40px; height:40px ;"class="btn btn-primary" href="{{ url('empleado/') }}">
         <i class="fa-solid fa-rotate-left" style="position: absolute; margin-left: -7px; margin-top: 5px"></i>
    </a>

    <i class="fa-regular fa-circle-check" style="position: absolute; margin-left: 12px; margin-top: 12px"></i>
    <input style="width: 40px; height:40px " class="btn btn-success" type="submit" value="" />
    
</div>
