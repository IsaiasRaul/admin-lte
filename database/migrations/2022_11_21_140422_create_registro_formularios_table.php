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
        Schema::create('registro_formularios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_estado');
            $table->unsignedBigInteger('id_convocatoria');
            $table->unsignedBigInteger('id_municipalidad');
            $table->tinyInteger('activo');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_estado')->references('id')->on('estados')->onDelete("cascade")->onUpdate("cascade");
            $table->foreign('id_convocatoria')->references('id')->on('convocatorias')->onDelete("cascade")->onUpdate("cascade");
            $table->foreign('id_municipalidad')->references('id')->on('municipalidades')->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_formularios');
    }
};
