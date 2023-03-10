<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();

            $table->date('Fecha');
            $table->time('Hora');

            $table->bigInteger('empleados_CI')->unsigned();
            $table->engine = "InnoDB";
            $table->foreign('empleados_CI')->references('CI')->on('empleados')->onDelete("cascade");

            $table->bigInteger('clientes_CI')->unsigned();
            $table->engine = "InnoDB";
            $table->foreign('clientes_CI')->references('CI')->on('clientes')->onDelete("cascade");

            // $table->bigInteger('servicios_Cod')->unsigned();
            // $table->engine = "InnoDB";
            // $table->foreign('servicios_Cod')->references('Cod')->on('servicios')->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
