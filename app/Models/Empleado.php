<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;


    public function citas()
    {


        return $this->hasMany('App\Models\Cita', 'empleado_id', 'id');
    }

    public function pagos()
    {


        return $this->hasMany('App\Models\Pago', 'empleado_id', 'id');
    }

    public function horarios()
    {


        return $this->hasMany('App\Models\Horario', 'empleados_id', 'id');
    }
}
