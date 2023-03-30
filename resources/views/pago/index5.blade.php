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

        @section('js')
            {{-- {!! $chart1->renderChartJsLibrary() !!}
        {!! $chart1->renderJs() !!} --}}

            <script>
                $(document).ready(function() {
                    $('#pagos').DataTable({
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
            <h3>Pago de Servicios</h3>
        </center>

        <a href="{{ url('pago/create') }}" class="btn btn-success">
            <i class="fa-regular fa-calendar-plus" style="margin-top: 10px"></i>
        </a>
        <br />
        <br />

        <div class="table-respomsive">
            <table class="table table-striped table-bordered table-hover" id="pagos">
                <thead class="thead-dark">
                    <tr>
                        <th scope=" col">#</th>
                        <th scope=" col"># de cita</th>
                        <th scope="col">Barbero</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Servicio</th>
                        <th scope="col">Costo</th>
                        <th scope="col">Tipo de Pago</th>
                        <th scope="col">REF</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($pagos as $pago)
                        <tr>
                            <td scope="row">{{ $pago->id }}</td>
                            <td scope="row">{{ $pago->cita_id }}</td>
                            <td>{{ $pago->cita->empleado->Nombres }}
                                {{ $pago->cita->empleado->Apellidos }}<br>{{ $pago->cita->empleado->CI }}</td>
                            <td>{{ $pago->cita->cliente->Nombres }}
                                {{ $pago->cita->cliente->Apellidos }}<br>{{ $pago->cita->cliente->CI }}</td>
                            <td>
                                @if (!empty($pago->servicios))
                                    @foreach ($pago->cita->servicios as $servicio)
                                        <div class="{{ !$loop->first ? 'mt-n2' : '' }}">
                                            {{ $servicio->Descripcion }}
                                        </div>
                                    @endforeach
                                @endif
                            </td>
                            <td>

                                @if (!empty($pago->cita->servicios))
                                    @foreach ($pago->cita->servicios as $servicio)
                                        <div class="{{ !$loop->first ? 'mt-n2' : '' }}">
                                            {{ $servicio->Costo }} ;
                                        </div>
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ $pago->TipodePago }}</td>
                            <td>{{ $pago->REF }}</td>
                            <td>
                                <a href="{{ url('/pago/' . $pago->id . '/edit') }}" class="btn btn-warning"
                                    style="width: 40px; height: 40px">
                                    <i class="fa-solid fa-pen"
                                        style="
                                        position: absolute;
                                        margin-left: -7px;
                                        margin-top: 5px;
                                    "></i>
                                </a>
                                |

                                <form action="{{ url('/pago/' . $pago->id) }}" class="d-inline" method="post">
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

            <?php
            // $totalPagos = 0;
            // $totalCostos = 0;
            
            // $t = [];
            
            // foreach ($pagos as $pago) {
            //     $temp = 0;
            //     $totalPagos += 1;
            //     foreach ($pago->servicios as $servicio) {
            //         $totalCostos += $servicio->Costo;
            //         $temp += $servicio->Costo;
            //     }
            
            //     array_push($t, [$servicio->id, $temp]);
            // }
            ?>

            {{-- <label for="">Total de pagos</label>
            <input type="text" class="form-control" disabled value="<?php echo $totalPagos; ?>" />

            <label for="">Total de costos</label>
            <input type="text" class="form-control" disabled value="<?php echo $totalCostos; ?>" /> --}}

            <div>
                <canvas id="myChart"></canvas>
            </div>

            {{-- @dd(json_encode($data['label'])) --}}

            <script>
                
            </script>


        </div>
        {{-- {!! $pagos->links() !!} --}}
    </div>
</div>
@endsection
