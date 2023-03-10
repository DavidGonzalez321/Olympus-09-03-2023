<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Barbería Olympus</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barbería Olympus</title>



    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/estilos para el componente de sotfware.css') }}">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('font-6/css/all.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/select2.css') }}">

    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>

    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>

    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>

    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>

    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>

    <script src="{{ asset('js/select2.js') }}"></script>


    @yield('js')
    @yield('css')


</head>



<body background="{{ asset('assets/images/slideshow/slide-3.jpg') }}" alt="" data-bgposition="center center"
    data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina
    style="background-repeat:no-repeat; background-size: cover;">


    @if (auth()->check())
        <div class="general">

            <div class="barra">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">



                        <!--top-right-contact-->
                        <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <center>
                                    <img src="/imágenes/logo barbería.jpg" class="logo"
                                        style="height:100px; width:100px; margin-left: 50px;">
                                </center>
                            </li>
                            <li>
                                <a class="btn btn-outline  rounded-pill botones-navbar"
                                    style="color: white;  border-color:  rgb(193, 209, 207); height: 40px;width: 180px; margin: 10px;"
                                    href="{{ route('./.') }}">Menú
                                    Principal</a>

                            </li>
                            <li>
                                <a class="btn btn-outline  rounded-pill botones-navbar"
                                    style=" color: white;  border-color:  rgb(193, 209, 207); height: 40px;width: 180px; margin: 10px;"
                                    href="{{ route('cita.index') }}">Citas</a>

                            </li>
                            <li>
                                <a class="btn btn-outline  rounded-pill botones-navbar"
                                    style="color: white;  border-color:  rgb(193, 209, 207); height: 40px;width: 180px; margin: 10px;"
                                    href="{{ route('horario.index') }}">Horario
                                    laboral</a>

                            </li>
                            <li>
                                <a class="btn btn-outline  rounded-pill botones-navbar"
                                    style="color: white;  border-color:  rgb(193, 209, 207); height: 40px;width: 180px; margin: 10px;"
                                    href="{{ route('pago.index') }}">Control de Pagos</a>

                            </li>
                            <li>
                                <a class="btn btn-outline  rounded-pill botones-navbar"
                                    style="color: white;  border-color:  rgb(193, 209, 207); height: 40px;width: 180px; margin: 10px;"
                                    href="{{ route('cliente.index') }}">Clientes</a>

                            </li>
                            <li>
                                <a class="btn btn-outline  rounded-pill botones-navbar"
                                    style="color: white;  border-color:  rgb(193, 209, 207); height: 40px;width: 180px; margin: 10px;"
                                    href="{{ route('empleado.index') }}">Empleados</a>

                            </li>
                            <li>
                                <a class="btn btn-outline  rounded-pill botones-navbar"
                                    style="color: white;  border-color:  rgb(193, 209, 207); height: 40px;width: 180px; margin: 10px;"
                                    href="{{ route('servicio.index') }}">Servicios</a>

                            </li>
                            </li>
                            <li>
                                <a href="{{ route('login.destroy') }}"class="btn btn-outline  rounded-pill botones-navbar"
                                    style="color: red;  border-color:  rgb(193, 209, 207); height: 40px;width: 180px; margin: 10px;">Cerrar
                                    Sección</a>

                            </li>
                        </ul>
                    </div>
            </div>
            </nav>



            <div class="contenido">
                <section>
                    <!--section para el Header de los logos y nombe de la comunidad-->

                    <header class="d-flex flex-wrap justify-content-center py-3 mb-4">

                        <div class="text-center">
                            <h1 class="titulo">BARBERÍA OLYMPUS</h1>

                        </div>

                    </header>

                    <Div style="position: absolute; top: 10px; right: 20px ; padding: 20px;">
                        <div class="container" style="color: white;">
                            @yield('section') <h4 style="color: white; text-align: right;">{{ auth()->user()->name }}
                            </h4>
                            <h5 id="hora" style="text-align: right;"></h5>
                        </div>
                    </Div>



                </section>
            @else
    @endif


    @yield('content')

    <center>

        <div style="margin: 40px; display: block;width: 400px; ">
            <!-- footer start -->
            <div class="footer bg-color-2 pad80 text-center" style=" height: 100px;">
                <br>
                <div class="container" style="color: white; margin:0px ; display:inline-block">
                    <div class="row mb40">
                        <div class="col-md-3">
                            <div>
                                <div>
                                    <center><img src="/imágenes/UPTA-logo-blanco.jpg" alt=""
                                            class="img-center img-responsive" style="height: 70px;width: 70px;" />
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="footer-contact text-right">
                                <p>Copyright
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-contact text-left">
                                <p>Todos los derechos reservados</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- footer end -->
        </div>
        </div>

    </center>






    </div>

    <script>
        const time = new Date()
        const [day, month, year] = [time.getDate(), time.getMonth() + 1, time.getFullYear()]
        const meses = [
            'Enero',
            "Enero",
            "Febrero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Julio",
            "Agosto",
            "Septiembre",
            "Octubre",
            "Noviembre",
            "Diciembre"

        ]
        document.getElementById('hora').innerHTML += `${day} de ${meses[month]} de ${year}`;
    </script>

    </div>





</body>

</html>
