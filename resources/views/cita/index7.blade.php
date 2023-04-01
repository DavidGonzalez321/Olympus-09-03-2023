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
            
            <?php
            $totalCitas = 0;

            
            $t = [];
            
            foreach ($citas as $cita) {
                $temp = 0;
                $totalCitas += 1;
            }

            use App\Models\Cita;

            $pendiente = Cita::where('Estado', 'Pendiente')->count();
            $atendida = Cita::where('Estado', 'Atendida')->count();
            
            
            
            ?>

        @section('js')
            <script>
                $(document).ready(function() {
                    $('#citas').DataTable({
                        language: {
                            "lengthMenu": "Mostrar _MENU_ registros",
                            "zeroRecords": "No se encontraron resultados",
                            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                            "sSearch": "Buscar:",
                            "oPaginate": {
                                "sFirst": "Primero",
                                "sLast": "Último",
                                "sNext": "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "sProcessing": "Procesando...",
                        },
                        //para usar los botones   
                        responsive: "true",
                        dom: 'Bfrtilp',
                        buttons: [{
                                extend: 'excelHtml5',
                                text: '<i class="fas fa-file-excel"></i> ',
                                titleAttr: 'Exportar a Excel',
                                className: 'btn btn-success'
                            },
                            {
                                extend: 'pdfHtml5',
                                text: '<i class="fas fa-file-pdf"></i> ',
                                titleAttr: 'Exportar a PDF',
                                title: 'Listado de Citas',
                                messageTop: document.getElementById('hora').innerHTML +=
                                    `${day} de ${meses[month]} de ${year}`,
                                className: 'btn btn-danger'
                            },
                            {
                                extend: 'print',
                                text: '<i class="fa fa-print"></i> ',
                                titleAttr: 'Imprimir',
                                className: 'btn btn-info'
                            },
                        ]
                    });
                });
            </script>
        @endsection



        <center>
            <h3>Citas</h3>
        </center>

        @role('admin')
            <a href="{{ url('cita/create') }}" class="btn btn-success">
                <i class="fa-regular fa-calendar-plus" style="margin-top: 10px"></i>
            </a>
        @endrole

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
                        <th scope="col">Estado</th>
                        @role('admin')
                            <th scope="col">Acciones</th>
                        @endrole
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
                                            <?  ?>
                                        </div>
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($cita->Fecha)->format('Y-m-d') }}</td>
                            <td>{{ $cita->Hora }}</td>
                            <td>{{ $cita->Estado }}</td>

                            @role('admin')
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
                            @endrole
                        </tr>
                    @endforeach
                </tbody>
            </table>




            <label for="">Total de citas</label>
            <input type="text" class="form-control" style="width: 25%" disabled value="<?php echo $totalCitas; ?>" />

            <label for="">Citas atendidas</label>
            <input type="text" class="form-control" style="width: 25%" disabled value="<?php echo $atendida; ?>" />

            <label for="">Citas pendientes</label>
            <input type="text" class="form-control" style="width: 25%" disabled value="<?php echo $pendiente; ?>" />



        </div>

    </div>
</div>
@endsection
