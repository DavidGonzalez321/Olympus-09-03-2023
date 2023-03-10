<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;


    public function citas()
    {


        return $this->hasMany('App\Models\Cita', 'empleados_CI', 'CI');
    }

    public function pagos()
    {


        return $this->hasMany('App\Models\Pago', 'empleados_CI', 'CI');
    }

    public function horarios()
    {


        return $this->hasMany('App\Models\Horario', 'empleados_CI', 'CI');
    }
}
