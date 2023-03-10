<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->string('TipodePago');
            $table->string('REF');

            $table->bigInteger('empleados_CI')->unsigned();
            $table->engine="InnoDB";
            $table->foreign('empleados_CI')->references('CI')->on('empleados')->onDelete("cascade");
            
            $table->bigInteger('clientes_CI')->unsigned();
            $table->engine="InnoDB";
            $table->foreign('clientes_CI')->references('CI')->on('clientes')->onDelete("cascade");

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
        Schema::dropIfExists('pagos');
    }
}
