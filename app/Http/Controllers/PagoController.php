<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Cita;
use App\Models\PagosServicios;
use App\Models\Empleado;
use App\Models\Cliente;
use App\Models\PagosCitas;
use App\Models\Servicio;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        $chart_options = [
        //     'chart_title' => 'Transactions by user',
        //     'chart_type' => 'bar',
        //     'report_type' => 'group_by_relationship',
        //     'model' => 'App\Models\Pago',

        //     'relationship_name' => 'empleado', // represents function user() on Transaction model
        //     'group_by_field' => 'CI', // users.name

        //     'aggregate_function' => 'sum',
        //     'aggregate_field' => 'amount',

        //     // 'filter_field' => 'transaction_date',
        //     'filter_days' => 30, // show only transactions for last 30 days
        //     'filter_period' => 'week', // show only transactions for this week
        // ];
        //     $chart1 = new LaravelChart($chart_options);


        $pagos = Pago::all();
        $empleados = Empleado::all();

        $data = [];

        foreach ($pagos as $pago) {
            $data['label'][] =  $pago->empleado_Nombres; /// Jean David
            $data['data'][] =  $pago->id; //1 2
        }
        // $data['data'] = json_encode($data);

        ////return  $data['label'];
        //        return  $data['data'];

        return view('pago.index5', compact('pagos', 'data'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $pago = new pago();

        $empleados = Empleado::pluck('Nombres', 'id');
        $clientes = Cliente::pluck('Nombres', 'id');
        $servicios = Servicio::all();
        $citas = Cita::pluck('Fecha', 'id');
        //
        return view('pago.create', compact('pago', 'empleados', 'clientes', 'servicios', 'citas'));
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
            // 'servicios' => 'required|array',
            'TipodePago' => 'required|string|max:30',
            'REF' => '|string|max:30',
            'cita_id' => 'required|string|max:30',

            //'empleado_id' => 'required|string|max:30',
            //'cliente_id' => 'required|string|max:30',
        ];

        $mensaje = [
            'REF.required' => 'La REF es requerida',
            'required' => 'El :attribute es requerido',
            'cita_id.required' => 'la cita es requerida',
            'cita_id.unique' => 'la cita es requerida',


        ];

        $this->validate($request, $campos, $mensaje);

        $datosPago = request()->except('_token', 'citas');

        $pago = Pago::create($datosPago);



        return redirect('pago')->with('mensaje', 'Pago agregado con éxito');
        //        return redirect()->route('pago.index')->with('mensaje', 'Pago agregado con éxito');
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

        $empleados = Empleado::pluck('Nombres', 'id');
        $clientes = Cliente::pluck('Nombres', 'id');
        $servicios = Servicio::all();
        $citas = Cita::all();

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
            'TipodePago' => 'required|string|max:30',
            'REF' => 'required|string|max:30',
            'cita_id' => 'required|string|max:30',
            // 'empleado_id' => 'required|string|max:30',
            //'cliente_id' => 'required|string|max:30',
        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'REF.required' => 'La REF es requerida',
        ];


        // dd($request->get('servicios'));
        $this->validate($request, $campos, $mensaje);

        $datosPago = request()->except('_token', 'citas');

        $pago = Pago::find($id);

        $pago->citas()->sync($request->get('citas'));



        $pago->update($datosPago);

        return redirect('pago')->with('mensaje', 'Pago Modificado');
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
