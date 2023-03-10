<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Horario;
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

        $empleados = Empleado::pluck('Nombres','CI');

        return view('horario.create', compact('horario','empleados',));
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
            'empleados_CI' => 'required|string|max:30',
            'Fecha' => 'required|date|max:30',
            'Entrada' => 'required|string|max:30',
            'Salida' => 'required|string|max:30',

        ];

        $mensaje = [
            'Fecha.required' => 'La fecha es requerida',
            'Entrada.required' => 'La hora de entrada es requerida',
            'Salida.required' => 'La hora de salida es requerida',
            'required' => 'El :attribute es requerido',

        ];

        $this->validate($request, $campos, $mensaje);



        // $datosHorario=request()->all();
        $datosHorario = request()->except('_token');

        if ($request->hasFile('Foto')) {
        }
        Horario::insert($datosHorario);


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
        $empleados = Empleado::pluck('Nombres','CI');
        return view('horario.edit', compact('horario','empleados'));
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
        //

        $campos = [
            'empleados_CI' => 'required|string|max:30',
            'Fecha' => 'required|string|max:30',
            'Entrada' => 'required|string|max:30',
            'Salida' => 'required|string|max:30',

        ];

        $mensaje = [
            'Empleado.required' => 'El empleado es requerida',
            'Fecha.required' => 'La fecha es requerida',
            'Entrada.required' => 'La hora de entrada es requerida',
            'Salida.required' => 'La hora de salida es requerida',
            'required' => 'El :attribute es requerido',

        ];


        $this->validate($request, $campos, $mensaje);


        $datosHorario = request()->except(['_token', '_method']);


        Horario::where('id', '=', $id)->update($datosHorario);
        $horario = Horario::findOrFail($id);

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
        return redirect('horario')->with('mensaje', 'Horario Borrado');
    }

    public function empleado()
    {
        //

        return $this->hasMany('App\Models\Empleado','empleados_CI','CI');
    }


}
