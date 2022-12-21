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
        Schema::create('reglas_formulario_mensajes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_regla');
            $table->string('configuracion_mensaje',2000);
            $table->string('mensaje',2000);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_regla')->references('id')->on('reglas_formularios')->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reglas_formulario_mensajes');
    }
};
