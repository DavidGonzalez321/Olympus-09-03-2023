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

    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>

    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>

    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>

    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>

    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('font-6/css/all.css') }}" rel="stylesheet" />

    @yield('js')
    @yield('css')
    

</head>



<body background="{{ asset('assets/images/slideshow/slide-3.jpg') }}" alt="" data-bgposition="center center" data-bgfit="cover"
    data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina style="background-repeat:no-repeat; background-size: cover;">


    @if (auth()->check())
        <div class="general">

            <div class="barra">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">



                        <!--top-right-contact-->
                        <ul class="nav navbar-nav" >
                            <li class="nav-item">
                                <center>
                                    <img src="/imágenes/logo barbería.jpg" class="logo" style="height:100px; width:100px; margin-left: 50px;">
                                </center>
                            </li>
                            <li  >
                                <a class="btn btn-outline  rounded-pill" style="color: white;  border-color:  rgb(193, 209, 207); height: 40px;width: 180px; margin: 10px;" href="{{ route('home2') }}">Menú
                                    Principal</a>
                                    
                            </li>
                            <li >
                                <a class="btn btn-outline  rounded-pill" style="color: white;  border-color:  rgb(193, 209, 207); height: 40px;width: 180px; margin: 10px;" href="{{ route('denegado') }}">Citas</a>
                                
                            </li>
                            <li >
                                <a class="btn btn-outline  rounded-pill" style="color: white;  border-color:  rgb(193, 209, 207); height: 40px;width: 180px; margin: 10px;" href="{{ route('denegado') }}">Horario
                                    laboral</a>
                                    
                            </li>
                            <li>
                                <a class="btn btn-outline  rounded-pill" style="color: white;  border-color:  rgb(193, 209, 207); height: 40px;width: 180px; margin: 10px;" href="{{ route('denegado') }}">Control de Pagos</a>
                                    
                            </li>
                            <li >
                                <a class="btn btn-outline  rounded-pill" style="color: white;  border-color:  rgb(193, 209, 207); height: 40px;width: 180px; margin: 10px;"
                                    href="{{ route('denegado') }}">Clientes</a>
                                    
                            </li>
                            <li >
                                <a class="btn btn-outline  rounded-pill" style="color: white;  border-color:  rgb(193, 209, 207); height: 40px;width: 180px; margin: 10px;"
                                    href="{{ route('denegado') }}">Empleados</a>
                                    
                            </li>
                            <li >
                                <a class="btn btn-outline  rounded-pill" style="color: white;  border-color:  rgb(193, 209, 207); height: 40px;width: 180px; margin: 10px;"
                                    href="{{ route('denegado') }}">Servicios</a>
                                    
                            </li>
                            </li>
                            <li>
                                <a href="{{ route('login.destroy') }}"class="btn btn-outline  rounded-pill" style="color: red;  border-color:  rgb(193, 209, 207); height: 40px;width: 180px; margin: 10px;">Cerrar
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

                </section>

                <div class="container" style="color: white">
                    @yield('section') <h4 style="color: white;">{{ auth()->user()->name }}</h4>
                    <h5 id="hora"></h5>
                </div>
            @else
    @endif

    @yield('content')

    <div class="cabeza" style="margin-top: 40px; display: block;">

        <!-- footer start -->
        <div class="footer bg-color-2 pad80 text-center" style="margin:20px ; height: 210px; ">
            <br>
            <div class="container" style="color: white; margin:20px ;">
                <div class="row mb30">
                    <div class="col-md-4 col-sm-5">
                        <div class="footer-contact text-right">
                            <p>Telefonos: (0244) 3222822<br> (0244) 3217054
                            </p>
                            <p>
                                Pagina Web:
                                <a href="http://upta.edu.ve/inicio">Conoce nuestra casa de estudio</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="footer-icon">
                            <div class="rotate-45deg">
                                <center><img src="/imágenes/UPTA-logo-blanco.jpg" alt=""
                                        class="img-center img-responsive" style="height: 150px;width: 150px;" />
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5">
                        <div class="footer-contact text-left">
                            <p>Venezuela/Aragua</p>
                            <p>La Victoria</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- footer end -->
    </div>
    </div>



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
