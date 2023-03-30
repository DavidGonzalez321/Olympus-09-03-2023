<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Servicio;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Exceptions\RoleAlreadyExists;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;



class DatabaseSeeder extends Seeder
{
    use HasRoles;

    
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // \App\Models\User::factory(10)->create();


        $user = new User;
        $user->name = 'Admin';
        $user->username = 'Admin';
        $user->CI = '999999999';
        $user->email = 'admin@test.com';
        $user->password = '123123123';

        $user->save();

        $cliente = new Cliente;
        $cliente->Nombres = 'Carlos';
        $cliente->Apellidos = 'Blanco';
        $cliente->Nacionalidad = 'V';
        $cliente->CI = '888888888';
        $cliente->Correo = 'a@a.com';
        $cliente->Telefono = '1231231234';

        $cliente->save();

        $empleado = new Empleado;
        $empleado->Nombres = 'Juan';
        $empleado->Apellidos = 'Soto';
        $empleado->Nacionalidad = 'V';
        $empleado->CI = '77777777';
        $empleado->Cargo = 'Barbero';
        $empleado->Correo = 'a@a.com';
        $empleado->Telefono = '1231231234';

        $empleado->save();

        $servicio = new Servicio;
        $servicio->Cod = '0001';
        $servicio->Descripcion = 'Corte';
        $servicio->Costo = '3';

        $servicio->save();
    }
}
