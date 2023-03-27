<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Exceptions\RoleAlreadyExists;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       $role1 = Role::create(['name' => 'admin']);
       $role2 = Role::create(['name' => 'user']);
    //    $user = User::find(1);
    //    $user->assingRole($role1);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
};
