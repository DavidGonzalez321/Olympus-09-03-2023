@extends('layouts.app2') @section('content')
    <section>
        <center>
            <main>

                <!-- LAYER NR. 1 -->
                <div data-responsive_offset="on" class="col-8"
                    style="
                    color: white;
                    z-index: 5;
                    white-space: nowrap;
                    font-family: 'Open Sans', sans-serif;
                ">
                    BIENVENIDO
                </div>

                <br>

                <!-- LAYER NR. 2 -->
                <div data-responsive_offset="on" class="col-8"
                    style="
                    color: white;
                    z-index: 5;
                    white-space: nowrap;
                    font-family: 'Open Sans', sans-serif;
                ">
                    LA BARBERÍA OLYMPUS
                </div>

                <!-- LAYER NR. 3 -->
                <div data-responsive_offset="on" class="col-8"
                    style="
                    color: rgb(191, 137, 28);
                    z-index: 5;
                    white-space: nowrap;
                    font-family: 'Open Sans', sans-serif;
                ">
                    SIEMPRE DA LO MEJOR DE SI
                </div>

                <br>

                <!-- LAYER NR. 4 -->
                <div
                    style="
                    z-index: 8;
                    width: 200px;

                    line-height: 15px;
                    color: rgba(255, 255, 255, 1);
                    font-family: Open Sans;
                    background-color: rgba(0, 0, 0, 0);
                    padding: 13px 35px 13px 35px;
                    border-color: rgba(255, 255, 255, 0.25);
                    border-style: solid;
                    border-width: 2px;
                    letter-spacing: 1px;
                    text-transform: uppercase;
                ">
                    Componete de Sotfware
                </div>

                <br>

                <div style="display: flex; ">

<center>



</center>

                    <a href="{{ route('denegado') }}" style="text-decoration: none;color: white;margin: 18px;" class="col-2">
                        <div class="card" style="width: 120px;height: 120px; background-color: rgb(132, 134, 133);">
                            <i style="margin-top: 10px;font-size: 40px;" class="fa-solid fa-sack-dollar"></i>
                            <div class="card-body">
                                <p class="card-text"> REGISTRAR PAGO</p>
                            </div>
                        </div>
                    </a>


                    <a href="{{ route('denegado') }}" style="text-decoration: none;color: white;margin: 18px;" class="col-2">
                        <div class="card" style="width: 120px;height: 120px;background-color: rgb(132, 134, 133);">
                            <i style="margin-top: 10px;font-size: 40px;" class="fa-solid fa-calendar-plus"></i>
                            <div class="card-body">
                                <p class="card-text">AGENDAR CITA</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('denegado') }}" style="text-decoration: none;color: white; margin: 18px;" class="col-2">
                        <div class="card" style="width: 120px;height: 120px; background-color: rgb(132, 134, 133);">
                            <i style="margin-top: 10px;font-size: 40px;" class="fa-solid fa-user-plus"></i>
                            <div class="card-body">
                                <p class="card-text"> AGREGAR CLIENTE</p>
                            </div>
                        </div>


                    </a>

                    <a href="{{ route('denegado') }}" style="text-decoration: none;color: white; margin: 18px;" class="col-2">
                        <div class="card" style="width: 120px;height: 120px;background-color: rgb(132, 134, 133);">
                            <i style="margin-top: 10px;font-size: 40px;" class="fa-regular fa-address-card"></i>
                            <div class="card-body">
                                <p class="card-text">AGREGAR EMPLEADO</p>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('denegado') }}" style="text-decoration: none;color: white; margin: 18px;" class="col-2">
                        <div class="card" style="width: 120px;height: 120px;background-color: rgb(132, 134, 133);">
                            <i style="margin-top: 10px;font-size: 40px;" class="fa-solid fa-scissors"></i>
                            <div class="card-body">
                                <p class="card-text">CREAR SERVICIO</p>
                            </div>
                        </div>
                    </a>
            </main>
        </center>
    </section>
@endsection
