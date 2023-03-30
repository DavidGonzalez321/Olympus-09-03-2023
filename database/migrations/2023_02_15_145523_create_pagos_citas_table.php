<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos_citas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('cita_id');
            $table->foreign('cita_id')->references('id')->on('citas')->onDelete('cascade');
            $table->bigInteger('pago_id')->unsigned();
            $table->foreign('pago_id')->references('id')->on('pagos')->onDelete("cascade");
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
        Schema::dropIfExists('pagos_citas');
    }
}
