<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;


    public function empleado()
    {
        //

        return $this->hasMany('App\Models\Empleado', 'empleados_id', 'id');
    }

    public function citas()
    {
        //

        return $this->belongsToMany(Cita::class, 'citas_servicios', 'servicio_id', 'cita_id', 'id');
    }

    public function pagos()
    {
        //

        return $this->belongsToMany(Pago::class, 'pagos_servicios', 'servicio_id', 'pago_id', 'id');
    }
}
