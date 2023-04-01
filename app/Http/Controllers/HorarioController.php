<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Horario;
use App\Models\Bitacora;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class HorarioController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['horarios'] = Horario::paginate(5);
        return view('horario.index6', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horario = new Horario();

        $empleados = Empleado::pluck('Nombres', 'id');

        return view('horario.create', compact('horario', 'empleados',));
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

        $fechaAyer = Carbon::yesterday()->toDateString();
        $hora = Carbon::createFromDate('08:00:00')->format('h:m:s');

        $campos = [
            'empleado_id' => 'required|string|max:30',
            'Fecha' => "required|date|max:30|after:{$fechaAyer}",
            'Entrada' => "required|string|after:{$hora}",
            'Salida' => 'required|string|max:30',

        ];

        $mensaje = [
            'Fecha.required' => 'La fecha es requerida',
            'Entrada.required' => 'La hora de entrada es requerida',
            'Salida.required' => 'La hora de salida es requerida',
            'empleados_id.required' => 'El empleado es requerido',
            'required' => 'El :attribute es requerido',

        ];

        $this->validate($request, $campos, $mensaje);



        // $datosHorario=request()->all();
        $datosHorario = request()->except('_token');

        if ($request->hasFile('Foto')) {
        }
        Horario::insert($datosHorario);

        Bitacora::create([
            'usuario' => (auth()->user()->name),
            'accion' => "Se ha registrado un horario",
            'estado' => "exitoso",
        ]);


        // return response()->json($datosHorario);
        return redirect('horario')->with('mensaje', 'Horario agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show(Horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $horario = Horario::findOrFail($id);
        $empleados = Empleado::pluck('Nombres', 'id');
        return view('horario.edit', compact('horario', 'empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fechaAyer = Carbon::yesterday()->toDateString();
        $hora = Carbon::createFromDate('08:00:00')->format('h:m:s');

        $campos = [
            'empleado_id' => 'required|string|max:30',
            'Fecha' => "required|date|max:30|after:{$fechaAyer}",
            'Entrada' => "required|string|after:{$hora}",
            'Salida' => 'required|string|max:30',

        ];

        $mensaje = [
            'empleados_id.required' => 'El empleado es requerido',
            'Fecha.required' => 'La fecha es requerida',
            'Entrada.required' => 'La hora de entrada es requerida',
            'Salida.required' => 'La hora de salida es requerida',
            'required' => 'El :attribute es requerido',

        ];


        $this->validate($request, $campos, $mensaje);


        $datosHorario = request()->except(['_token', '_method']);


        Horario::where('id', '=', $id)->update($datosHorario);
        $horario = Horario::findOrFail($id);

        Bitacora::create([
            'usuario' => (auth()->user()->name),
            'accion' => "Se ha editado un horario",
            'estado' => "exitoso",
        ]);

        // return view('horario.edit', compact('horario') );
        return redirect('horario')->with('mensaje', 'Horario Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Horario::destroy($id);

        Bitacora::create([
            'usuario' => (auth()->user()->name),
            'accion' => "Se ha eliminado un horario",
            'estado' => "exitoso",
        ]);

        return redirect('horario')->with('mensaje', 'Horario Borrado');
    }

    public function empleado()
    {
        //

        return $this->hasMany('App\Models\Empleado', 'empleados_CI', 'CI');
    }
}
