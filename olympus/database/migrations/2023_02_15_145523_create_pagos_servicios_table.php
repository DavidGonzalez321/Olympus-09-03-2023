<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_servicios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->engine = "InnoDB";
            $table->bigInteger('servicio_Cod')->unsigned();
            $table->foreign('servicio_Cod')->references('Cod')->on('servicios')->onDelete("cascade");
            $table->bigInteger('pago_id')->unsigned();
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
        Schema::dropIfExists('pagos_servicios');
    }
}
