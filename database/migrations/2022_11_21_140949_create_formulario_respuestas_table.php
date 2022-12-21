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
        Schema::create('formulario_respuestas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_formulario');
            $table->string('respuesta',5000)->nullable();
            $table->unsignedBigInteger('id_registro');
            $table->unsignedBigInteger('id_tipo_respuesta');            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_formulario')->references('id')->on('formularios')->onDelete("cascade")->onUpdate("cascade");
            $table->foreign('id_registro')->references('id')->on('registro_formularios')->onDelete("cascade")->onUpdate("cascade");
            $table->foreign('id_tipo_respuesta')->references('id')->on('tipo_respuestas')->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formulario_respuestas');
    }
};
