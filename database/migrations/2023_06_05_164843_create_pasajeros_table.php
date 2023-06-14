<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasajeros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->date('fechaNacimiento');
            $table->string('numeroPasaporte');
            $table->string('nacionalidad');
            $table->string('alimentacion');
            $table->unsignedBigInteger('reporte_id');
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
        Schema::dropIfExists('pasajeros');
    }
};
