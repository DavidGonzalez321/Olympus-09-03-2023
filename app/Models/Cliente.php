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

        return $this->hasOne('App\Models\Pago', 'cliente_id', 'id');
    }

    public function cita()
    {
        //

        return $this->hasMany('App\Models\Cita', 'cliente_id', 'id');
    }
}
