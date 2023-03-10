<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\PagosServicios;
use App\Models\Empleado;
use App\Models\Cliente;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['pagos'] = Pago::paginate(5);
        return view('pago.index5', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pago = new pago();

        $empleados = Empleado::pluck('Nombres', 'CI');
        $clientes = Cliente::pluck('Nombres', 'CI');
        $servicios = Servicio::all();
        //
        return view('pago.create', compact('pago', 'empleados', 'clientes', 'servicios'));
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
            'TipodePago' => 'required|string|max:30',
            'REF' => '|string|max:30',
            'empleados_CI' => 'required|string|max:30',
            'clientes_CI' => 'required|string|max:30',
        ];

        $mensaje = [
            'REF.required' => 'La REF es requerida',
            'required' => 'El :attribute es requerido',

        ];

        $this->validate($request, $campos, $mensaje);

        // dd($request);

        // $datosPago=request()->all();
        $datosPago = request()->except('_token', 'servicios');

        if ($request->hasFile('Foto')) {
        }

        $pago = Pago::create($datosPago);

        foreach ($request->input('servicios') as $servicio) {
            PagosServicios::create([
                'pago_id' => $pago->id,
                'servicio_Cod' => $servicio
            ]);
        }


        // return response()->json($datosPago);
        return redirect('pago')->with('mensaje', 'Pago agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $pago = Pago::findOrFail($id);

        $empleados = Empleado::pluck('Nombres', 'CI');
        $clientes = Cliente::pluck('Nombres', 'CI');
        $servicios = Servicio::all();

        $pago = pago::findOrFail($id);
        return view('pago.edit', compact('pago', 'empleados', 'clientes', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $campos = [
            'servicios' => 'required|array',
            'TipodePago' => 'required|string|max:30',
            'REF' => 'required|string|max:30',
            'empleados_CI' => 'required|string|max:30',
            'clientes_CI' => 'required|string|max:30',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'REF.required' => 'La REF es requerida',
            'Foto.required' => 'La foto es requerida',
        ];


        $this->validate($request, $campos, $mensaje);


        $datosPago = request()->except('_token', 'servicios');


        Pago::where('id', '=', $id)->update($datosPago);
        $pago = Pago::findOrFail($id);

        // return view('pago.edit', compact('pago') );
        return redirect('pago')->with('mensaje', 'pago Modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Pago::destroy($id);
        return redirect('pago')->with('mensaje', 'Pago Borrado');
    }
}
