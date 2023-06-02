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
        Schema::create('tramites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tramite_id');
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('orientadora_id');
            $table->unsignedBigInteger('alumno_id');
            $table->boolean('autorizado');
            
            $table->foreign('tramite_id')       ->references('id')->on('tramite_detalles');
            $table->foreign('tipo_id')          ->references('id')->on('tipo_tramites');
            $table->foreign('orientadora_id')   ->references('id')->on('users');
            $table->foreign('alumno_id')        ->references('id')->on('alumnos');

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
        Schema::dropIfExists('tramites');
    }
};
