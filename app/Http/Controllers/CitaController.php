<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\CitasServicios;
use App\Models\Empleado;
use App\Models\Cliente;
use App\Models\Bitacora;
use App\Models\Servicio;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
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
        $citas = Cita::all();
        return view('cita.index7', compact('citas',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cita = new cita();

        $empleados = Empleado::pluck('Nombres', 'id');
        $clientes = Cliente::pluck('Nombres', 'id');
        $servicios = Servicio::all();
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

        $fechaAyer = Carbon::yesterday()->toDateString();
        $hora = Carbon::createFromDate('08:00:00')->format('h:m:s');
        // $Horainicio = Carbon::createFromFormat('hh:mm:ss' . '08:00:00');

        // dd($hora);


        $campos = [
            'servicios' => 'required|array',
            'cliente_id' => 'required|string|max:30',
            'empleado_id' => 'required|string|max:30',
            'Estado' => 'required|string|max:30',
            'Fecha' => "required|date|max:30|after:{$fechaAyer}",
            'Hora' => "required|string|after:{$hora}",
        ];

        Bitacora::created([
            'usuario' => "{auth()->user->name}" ,
            'accion' => "Se ha registrado",
            'estado' => "exitodo",

        ]);



        $mensaje = [
            'empleado_id.required' => 'El empleado es requerido',
            'cliente_id.required' => 'El cliente es requerido',
            'required' => 'El :attribute es requerido',

        ];

        $this->validate($request, $campos, $mensaje);

        $datosCita = request()->except('_token', 'servicios');

        $cita = Cita::create($datosCita);

        foreach ($request->input('servicios') as $servicio) {
            CitasServicios::create([
                'cita_id' => $cita->id,
                'servicio_id' => $servicio
            ]);
        }

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
        $cita = Cita::findOrFail($id);

        $empleados = Empleado::pluck('Nombres', 'id');
        $clientes = Cliente::pluck('Nombres', 'id');
        $servicios = Servicio::all();

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

        $fechaAyer = Carbon::yesterday()->toDateString();
        $hora = Carbon::createFromDate('08:00:00')->format('h:m:s');

        $campos = [
            'servicios' => 'required|array',
            'cliente_id' => 'required|string|max:30',
            'empleado_id' => 'required|string|max:30',
            'Estado' => 'required|string|max:30',
            'Fecha' => "required|date|max:30|after:{$fechaAyer}",
            'Hora' => "required|string|after:{$hora}",
        ];

        $mensaje = [
            'empleado_id.required' => 'El empleado es requerido',
            'cliente_id.required' => 'El cliente es requerido',
            'Fecha.required' => 'La fecha es requerida',
            'Hora.required' => 'La hora son requerido',
            'required' => 'El :attribute es requerido',
        ];

        // dd($request->get('servicios'));
        $this->validate($request, $campos, $mensaje);

        $datosCita = request()->except('_token', 'servicios');

        $cita = Cita::find($id);

        $cita->servicios()->sync($request->get('servicios'));

        // foreach ($request->servicios as $servicio) {

        //     CitasServicios::create([
        //         'cita_id' => $cita->id,
        //         'servicio_Cod' => $servicio
        //     ]);

        //     // CitasServicios::updateOrCreate([
        //     //     'cita_id' => $cita->id
        //     // ], [
        //     //     'servicio_Cod' => $servicio
        //     // ]);

        // }

        $cita->update($datosCita);

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
        Cita::destroy($id);
        return redirect('cita')->with('mensaje', 'Cita Borrada');
    }
}
