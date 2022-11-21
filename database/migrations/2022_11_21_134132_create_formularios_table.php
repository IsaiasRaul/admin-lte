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
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_tipo_input');
            $table->unsignedBigInteger('id_etapa_producto');
            $table->string('label',500);
            $table->integer('name');
            $table->integer('pattern');
            $table->integer('requerido');
            $table->integer('orden');
            $table->tinyInteger('activo');
            $table->timestamps();

            $table->foreign('id_producto')->references('id')->on('productos')->onDelete("cascade")->onUpdate("cascade");
            $table->foreign('id_tipo_input')->references('id')->on('tipo_inputs')->onDelete("cascade")->onUpdate("cascade");
            $table->foreign('id_etapa_producto')->references('id')->on('etapaproductos')->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formularios');
    }
};
