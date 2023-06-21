<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoteles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reporte_id');
            $table->string('hotel');
            $table->string('lugar');
            $table->string('acomodacion');
            $table->date('fechaIngreso');
            $table->date('fechaSalida');
            $table->timestamps();
            $table->foreign('reporte_id')->references('id')->on('reportes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoteles');
    }
};