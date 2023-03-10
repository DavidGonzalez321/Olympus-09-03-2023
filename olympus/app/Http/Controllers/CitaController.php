<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\CitasServicios;
use App\Models\Empleado;
use App\Models\Cliente;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['citas'] = Cita::paginate(5);
        return view('cita.index7', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cita = new cita();

        $empleados = Empleado::pluck('Nombres', 'CI');
        $clientes = Cliente::pluck('Nombres', 'CI');
        $servicios = Servicio::pluck('Descripcion', 'Cod');
        //
        return view('cita.create', compact('cita', 'empleados', 'clientes', 'servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $campos = [
            'servicios' => 'required|array',
            'clientes_CI' => 'required|string|max:30',
            'empleados_CI' => 'required|string|max:30',
            'Fecha' => 'required|string',
            'Hora' => 'required|string',
        ];

        $mensaje = [
            'Fecha.required' => 'La fecha es requerida',
            'Hora.required' => 'La hora son requerido',
            'required' => 'El :attribute es requerido',

        ];

        $this->validate($request, $campos, $mensaje);

        // dd($request);

        // $datosCita=request()->all();
        $datosCita = request()->except('_token', 'servicios');

        if ($request->hasFile('Foto')) {
        }

        $cita = Cita::create($datosCita);

        foreach ($request->input('servicios') as $servicio) {
            CitasServicios::create([
                'cita_id' => $cita->id,
                'servicio_Cod' => $servicio
            ]);
        }


        // return response()->json($datosCita);
        return redirect('cita')->with('mensaje', 'Cita agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function show(Cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $cita = Cita::findOrFail($id);

        $empleados = Empleado::pluck('Nombres', 'CI');
        $clientes = Cliente::pluck('Nombres', 'CI');
        $servicios = Servicio::pluck('Descripcion', 'Cod');

        $cita = cita::findOrFail($id);
        return view('cita.edit', compact('cita', 'empleados', 'clientes', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos = [
            'servicios' => 'required|array',
            'clientes_CI' => 'required|string|max:30',
            'servicios_Cod' => 'required|string|max:50',
            'empleados_CI' => 'required|string|max:30',
            'Fecha' => 'required|string|max:30',
            'Hora' => 'required|string|max:30',

        ];

        $mensaje = [
            'Fecha.required' => 'La fecha es requerida',
            'Hora.required' => 'La hora son requerido',
            'required' => 'El :attribute es requerido',
            'Foto.required' => 'La foto es requerida',

        ];


        $this->validate($request, $campos, $mensaje);


        $datosCita = request()->except('_token', 'servicios');


        Cita::where('id', '=', $id)->update($datosCita);
        $cita = Cita::findOrFail($id);

        // return view('cita.edit', compact('cita') );
        return redirect('cita')->with('mensaje', 'Cita Modificada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cita  $cita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Cita::destroy($id);
        return redirect('cita')->with('mensaje', 'Cita Borrada');
    }
}
