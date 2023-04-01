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
            <script>
                $(document).ready(function() {
                    $('#bitacoras').DataTable({
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
                                title: 'Listado de Horarios',
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
            <h3>Horario</h3>
        </center>

        @role('admin')
            <a href="{{ url('horario/create') }}" class="btn btn-success">
                <i style="margin-top: 10px" class="fa-solid fa-hourglass"></i>
            </a>
        @endrole


        <br />
        <br />

        <div class="table-respomsive">
            <table class="table table-striped table-bordered table-hover" id="bitacoras">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="col-2">#</th>
                        <th scope="col" class="col-3">Usuario</th>
                        <th scope="col" class="col-3">Acción</th>
                        <th scope="col" class="col-3">Estado</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($bitacora as $bitacora)
                        <tr>
                            <td scope="row">{{ $bitacora->id }}</td>

                            <td>{{ $bitacora->usuario }}</td>
                            <td>{{ $bitacora->accion }}</td>
                            <td>{{ $bitacora->estado }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <br>

    </div>
</div>
@endsection
