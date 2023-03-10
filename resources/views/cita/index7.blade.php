@extends('layouts.app') @section('content')
    <div class="container">
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}
                <button type="buttom" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg col-10">
        @section('css')
            <link rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" />
            @endsection @section('js')
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

            <script>
                $(document).ready(function() {
                    $("#citas").DataTable({
                        language: {
                            lengthMenu: "Mostrar _MENU_ registros por páginas",
                            zeroRecords: "Ningún registro encontrado - disculpa",
                            info: "Mostrando _PAGE_ de _PAGES_ citas",
                            infoEmpty: "No hay registros disponibles",
                            infoFiltered: "(filtrado de _MAX_ registros totales)",
                            search: "Buscar:",
                            paginate: {
                                next: "Siguiente",
                                previous: "Anterior",
                            },
                        },
                    });
                });
            </script>
        @endsection
        <center>
            <h3>Citas</h3>
        </center>

        <a href="{{ url('cita/create') }}" class="btn btn-success">
            <i class="fa-regular fa-calendar-plus" style="margin-top: 10px"></i>
        </a>
        <br />
        <br />

        <div class="table-respomsive">
            <table class="table table-striped table-bordered table-hover" id="citas">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Barbero</th>
                        <th scope="col">Servicio</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($citas as $cita)
                        <tr>
                            <td>{{ $cita->cliente->Nombres }}
                                {{ $cita->cliente->Apellidos }}<br>{{ $cita->cliente->CI }}</td>
                            <td>{{ $cita->empleado->Nombres }}
                                {{ $cita->empleado->Apellidos }}<br>{{ $cita->cliente->CI }}</td>
                            <td>
                                @if (!empty($cita->servicios))
                                    @foreach ($cita->servicios as $servicio)
                                        <div class="{{ !$loop->first ? 'mt-n2' : '' }}">
                                            {{ $servicio->Descripcion }}
                                        </div>
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ $cita->Fecha }}</td>
                            <td>{{ $cita->Hora }}</td>
                            <td>
                                <a href="{{ url('/cita/' . $cita->id . '/edit') }}" class="btn btn-warning"
                                    style="width: 40px; height: 40px">
                                    <i class="fa-solid fa-pen"
                                        style="
                                        position: absolute;
                                        margin-left: -7px;
                                        margin-top: 5px;
                                    "></i>
                                </a>
                                |

                                <form action="{{ url('/cita/' . $cita->id) }}" class="d-inline" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <i class="fa-solid fa-trash"
                                        style="
                                        position: absolute;
                                        margin-left: 13px;
                                        margin-top: 11px;
                                    "></i>
                                    <input style="width: 40px; height: 40px" class="btn btn-danger" type="submit"
                                        onclick="return confirm('¿Quieres borrar?')" value="" />
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {!! $citas->links() !!}
    </div>
</div>
@endsection
