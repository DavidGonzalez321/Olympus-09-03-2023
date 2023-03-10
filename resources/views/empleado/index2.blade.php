@extends('layouts.app') @section('content')
<div class="container">
    @if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('mensaje') }}
        <button
            type="buttom"
            class="close"
            data-dismiss="alert"
            aria-label="Close"
        >
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div
        class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 rounded-lg shadow-lg col-10"
    >

    @section('css')

<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"
/>
<link
    rel="stylesheet"
    href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"
/>

@endsection @section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
    $('#empleados').DataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por páginas",
            "zeroRecords": "Ningún registro encontrado - disculpa",
            "info": "Mostrando _PAGE_ de _PAGES_ empleados",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate" : {
                "next": "Siguiente",
            "previous": "Anterior",
            },
            
            
        }
    } );
} );

    
</script>

@endsection

<center><h3>Empleados</h3></center>

        <a href="{{ url('empleado/create') }}" class="btn btn-success">
            <i style="margin-top: 10px" class="fa-regular fa-address-card"></i>
        </a>
        <br />
        <br />

        <div class="table-respomsive">
            <table class="table table-striped table-bordered table-hover" id="empleados">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">CI</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($empleados as $empleado)
                    <tr>
                        <td scope="row">{{ $empleado->CI }}</td>

                        <td>{{ $empleado->Nombres }}</td>
                        <td>{{ $empleado->Apellidos }}</td>
                        <td>{{ $empleado->Cargo }}</td>
                        <td>{{ $empleado->Correo }}</td>
                        <td>{{ $empleado->Telefono }}</td>
                        <td>
                            <a
                                href="{{ url('/empleado/' . $empleado->id . '/edit') }}"
                                class="btn btn-warning"
                                style="width: 40px; height: 40px"
                            >
                                <i
                                    class="fa-solid fa-pen"
                                    style="
                                        position: absolute;
                                        margin-left: -7px;
                                        margin-top: 5px;
                                    "
                                ></i>
                            </a>
                            |

                            <form
                                action="{{ url('/empleado/' . $empleado->id) }}"
                                class="d-inline"
                                method="post"
                            >
                                @csrf
                                {{ method_field("DELETE") }}
                                <i
                                    class="fa-solid fa-trash"
                                    style="
                                        position: absolute;
                                        margin-left: 13px;
                                        margin-top: 11px;
                                    "
                                ></i>
                                <input
                                    style="width: 40px; height: 40px"
                                    class="btn btn-danger"
                                    type="submit"
                                    onclick="return confirm('¿Quieres borrar?')"
                                    value=""
                                />
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {!! $empleados->links() !!}
    </div>
</div>

@endsection 


