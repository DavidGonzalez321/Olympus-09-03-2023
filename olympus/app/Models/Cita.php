<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Servicio;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function empleado()
    {
        //

        return $this->belongsTo('App\Models\Empleado', 'empleados_CI', 'CI');
    }

    public function cliente()
    {
        //

        return $this->belongsTo('App\Models\Cliente', 'clientes_CI', 'CI');
    }

    public function servicios()
    {
        //
        return $this->belongsToMany(Servicio::class, 'citas_servicios', 'cita_id', 'servicio_Cod', 'id', 'Cod');

        // return $this->belongsToMany('App\Models\Servicio','citas_servicios','cita_id', 'servicio_Cod');
    }
}