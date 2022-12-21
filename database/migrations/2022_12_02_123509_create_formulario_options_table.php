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
        Schema::create('formulario_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_formulario');
            $table->string('opciones');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_formulario')->references('id')->on('formularios')->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formulario_options');
    }
};
