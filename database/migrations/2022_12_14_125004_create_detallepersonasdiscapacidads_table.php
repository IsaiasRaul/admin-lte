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
        Schema::create('detallepersonasdiscapacidads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_registro');
            $table->string('rut',20);
            $table->unsignedBigInteger('id_estamento');
            $table->unsignedBigInteger('id_calidad_contractual');
            $table->unsignedBigInteger('id_jornada_laboral');
            $table->integer('monto_remuneracion_imponible');
            $table->unsignedBigInteger('id_verificador_cumplimiento');
            $table->string('genero',50);
            $table->date('fecha_ingreso_institucion');
            $table->date('periodo_contratacion_desde');
            $table->date('periodo_contratacion_hasta')->nullable();

            $table->foreign('id_registro')->references('id')->on('registro_formularios')->onDelete("cascade")->onUpdate("cascade");
            $table->foreign('id_estamento')->references('id')->on('estamentos')->onDelete("cascade")->onUpdate("cascade");
            $table->foreign('id_calidad_contractual')->references('id')->on('calidad_contractuals')->onDelete("cascade")->onUpdate("cascade");
            $table->foreign('id_jornada_laboral')->references('id')->on('jornada_laborals')->onDelete("cascade")->onUpdate("cascade");
            $table->foreign('id_verificador_cumplimiento')->references('id')->on('verificador_cumplimientos')->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallepersonasdiscapacidads');
    }
};
