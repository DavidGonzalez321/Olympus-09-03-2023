<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios_empleados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->engine = "InnoDB";
            $table->bigInteger('empleado_CI')->unsigned();
            $table->foreign('empleado_CI')->references('CI')->on('empleados')->onDelete("cascade");
            $table->bigInteger('horario_id')->unsigned();
            $table->foreign('horario_id')->references('id')->on('horarios')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios_empleados');
    }
}
