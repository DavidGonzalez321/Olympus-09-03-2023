<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function pago()
    {
        //

        return $this->hasOne('App\Models\Pago', 'clientes_CI', 'CI');
    }

    public function cita()
    {
        //

        return $this->hasMany('App\Models\Cita', 'clientes_CI', 'CI');
    }
}
