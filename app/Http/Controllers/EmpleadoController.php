<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Bitacora;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['empleados'] = Empleado::paginate(5);
        return view('empleado.index2', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('empleado.create');
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

            'CI' => 'required|string|unique:empleados,CI|max:15|min:6',
            'Nombres' => 'required|string|max:30',
            'Apellidos' => 'required|string|max:30',
            'Correo' => 'required|email|max:50',
            'Telefono' => 'required|string|max:15|min:8',

        ];

        $mensaje = [
            'CI.required' => 'La cedula es requerida',
            'required' => 'El :attribute es requerido',

        ];

        $this->validate($request, $campos, $mensaje);



        // $datosEmpleado=request()->all();
        $datosEmpleado = request()->except('_token');

        if ($request->hasFile('Foto')) {
        }
        Empleado::insert($datosEmpleado);

        Bitacora::create([
            'usuario' => (auth()->user()->name),
            'accion' => "Se ha registrado un empleado",
            'estado' => "exitoso",
        ]);


        // return response()->json($datosEmpleado);
        return redirect('empleado')->with('mensaje', 'Empleado agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos = [
            'CI' => 'required|string|max:15|min:6',
            'Nombres' => 'required|string|max:100',
            'Apellidos' => 'required|string|max:100',
            'Correo' => 'required|email',
            'Telefono' => 'required|string|max:100',

        ];

        $mensaje = [
            'CI.required' => 'La cedula es requerida',
            'required' => 'El :attribute es requerido',
            'Foto.required' => 'La foto es requerida',

        ];


        $this->validate($request, $campos, $mensaje);


        $datosEmpleado = request()->except(['_token', '_method']);


        Empleado::where('id', '=', $id)->update($datosEmpleado);
        $empleado = Empleado::findOrFail($id);

        Bitacora::create([
            'usuario' => (auth()->user()->name),
            'accion' => "Se ha editado un empleado",
            'estado' => "exitoso",
        ]);

        // return view('empleado.edit', compact('empleado') );
        return redirect('empleado')->with('mensaje', 'Empleado Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Empleado::destroy($id);

        Bitacora::create([
            'usuario' => (auth()->user()->name),
            'accion' => "Se ha eliminado un empleado",
            'estado' => "exitoso",
        ]);


        return redirect('empleado')->with('mensaje', 'Empleado Borrado');
    }
}
