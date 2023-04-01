<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;


use Illuminate\Http\Request;
use Spatie\Backup\BackupDestination\Backup;

class RespaldoController extends Controller
{
    public function __invoke()
    {
        Artisan::call('backup:run');
        return "Respaldo Creado";
    }
}
