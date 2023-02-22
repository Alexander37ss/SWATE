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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('no_control');
            $table->integer('edad');
            $table->string('sexo');
            $table->string('fecha_nacimiento');
            $table->string('domicilio');
            $table->string('telefono');
            $table->string('modalidad');
            $table->string('turno');
            $table->string('grupo');
            $table->integer('semestre');
            $table->string('especialidad');

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
        Schema::dropIfExists('alumnos');
    }
};
