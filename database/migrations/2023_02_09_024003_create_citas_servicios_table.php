<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas_servicios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->engine = "InnoDB";
            $table->bigInteger('servicio_Cod')->unsigned();
            $table->foreign('servicio_Cod')->references('Cod')->on('servicios')->onDelete("cascade");
            $table->bigInteger('cita_id')->unsigned();
            $table->foreign('cita_id')->references('id')->on('citas')->onDelete("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas_servicios');
    }
}
