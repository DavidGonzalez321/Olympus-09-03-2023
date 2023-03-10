<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    protected $fillable = ['TipodePago', 'REF', 'clientes_CI', 'empleados_CI','Descripcion' ];

    public function empleado()
    {
        return $this->belongsTo('App\Models\Empleado', 'empleados_CI', 'CI');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'clientes_CI', 'CI');
    }

    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'pagos_servicios', 'pago_id', 'servicio_Cod', 'id', 'Cod');
    }
}
