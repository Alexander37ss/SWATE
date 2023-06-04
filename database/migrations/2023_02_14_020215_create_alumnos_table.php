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
            
            $table->integer('edad');
            $table->string('fecha_nacimiento');
            $table->string('domicilio');
            $table->string('telefono');
            $table->string('modalidad');
            
            $table->string('carrera');
            $table->string('generacion');
            $table->string('turno');
            $table->integer('semestre');
            $table->string('grupo');
            $table->string('numero_control');
            $table->string('nombre');
            $table->string('paterno');
            $table->string('materno');
            $table->string('nombre_completo');
            $table->string('CURP');
            $table->string('sexo');
            $table->string('correo_tutor');
            
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
