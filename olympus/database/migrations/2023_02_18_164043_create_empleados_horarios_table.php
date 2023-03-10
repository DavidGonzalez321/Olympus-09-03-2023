<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados_horarios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->engine = "InnoDB";
            $table->bigInteger('horarios_id')->unsigned();
            $table->foreign('horarios_id')->references('Cod')->on('horarios')->onDelete("cascade");
            $table->bigInteger('empleado_id')->unsigned();
            $table->foreign('pago_id')->references('id')->on('pagos')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados_horarios');
    }
}
