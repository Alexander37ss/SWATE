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
        Schema::create('pre_justificantes', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_solicitante');
            $table->string('motivo');
            $table->string('motivo_otro')->nullable();

            $table->integer('del'); # desde que dia
            $table->integer('al');  # hasta que dia

            $table->integer('dia');
            $table->integer('mes');
            $table->integer('ano');

            # $table->img('INE_img');
            # $table->img('motivo_img');
            
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
        Schema::dropIfExists('pre_justificantes');
    }
};
