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

        return $this->belongsTo('App\Models\Empleado', 'empleado_id', 'id');
    }

    public function cliente()
    {
        //

        return $this->belongsTo('App\Models\Cliente', 'cliente_id', 'id');
    }

    public function servicios()
    {
        //
        return $this->belongsToMany(Servicio::class, 'citas_servicios', 'cita_id', 'servicio_id', 'id', 'id');

        // return $this->belongsToMany('App\Models\Servicio','citas_servicios','cita_id', 'servicio_Cod');
    }
}