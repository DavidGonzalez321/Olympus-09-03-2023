<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $fillable = ['TipodePago', 'REF', 'cliente_id', 'empleado_id', 'Descripcion', 'cita_id'];

    public function empleado()
    {
        return $this->belongsTo('App\Models\Empleado', 'empleado_id', 'id');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'cliente_id', 'id');
    }

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'pagos_servicios', 'pago_id', 'servicio_id', 'id', 'id');
    }

    public function cita()
    {
        return $this->belongsTo('App\Models\Cita', 'cita_id', 'id');
    }

    public function pagoEmpleado($empleado)
    {

        return Pago::where('id', $this->$empleado)->get();
        return $this->$empleado;

        return $this->$empleado;
    }
}