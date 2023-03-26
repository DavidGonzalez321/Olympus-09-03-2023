<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Browser;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['clientes'] = Cliente::paginate(5);
        // return view('cliente.index3', $datos);
        $clientes = Cliente::paginate();

        $puntos = [];
        foreach ($clientes as $cliente) {
            $puntos[] = ['name' => $cliente['Nombre'], 'y' => floatval($cliente['pago_id'])];
        }

        $data = json_encode($puntos);

        return view('cliente.index3', compact('clientes','datos', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cliente.create');
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

            'CI' => 'required|string|unique:clientes,CI|max:15|min:6',
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



        // $datosCliente=request()->all();
        $datosCliente = request()->except('_token');

        if ($request->hasFile('Foto')) {
        }
        Cliente::insert($datosCliente);


        // return response()->json($datosCliente);
        return redirect('cliente')->with('mensaje', 'Cliente agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cliente = cliente::findOrFail($id);
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CLiente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos = [

            'CI' => 'required|string|unique:clientes,CI|max:15|min:6',
            'Nombres' => 'required|string|max:30',
            'Apellidos' => 'required|string|max:30',
            'Correo' => 'required|email|max:30',
            'Telefono' => 'required|string|max:15|min:9',

        ];

        $mensaje = [
            'CI.required' => 'La cedula es requerida',
            'required' => 'El :attribute es requerido',
            'Foto.required' => 'La foto es requerida',

        ];


        $this->validate($request, $campos, $mensaje);


        $datosCliente = request()->except(['_token', '_method']);


        Cliente::where('id', '=', $id)->update($datosCliente);
        $cliente = Cliente::findOrFail($id);

        // return view('cliente.edit', compact('cliente') );
        return redirect('cliente')->with('mensaje', 'Cliente Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        //

        Cliente::destroy($id);
        return redirect('cliente')->with('mensaje', 'Cliente Borrado');
    }
}
