<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('empleados_CI')->unsigned();

            $table->foreign('empleados_CI')->references('CI')->on('empleados')->onDelete("cascade");
            $table->foreignId('empleados_CI')->constrained('empleados')->cascadeOnDelete();
            $table->timestamp('Fecha');
            $table->timestamp('Entrada');
            $table->timestamp('Salida');


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
        Schema::dropIfExists('horarios');
    }
}
