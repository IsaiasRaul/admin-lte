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
        Schema::create('etapaproductos', function (Blueprint $table) {
            $table->id();
            $table->string('title',500);
            $table->unsignedBigInteger('id_producto');
            $table->string('icon_class',255);
            $table->integer('orden');
            $table->tinyInteger('activo');
            $table->timestamps();

            $table->foreign('id_producto')
                    ->references('id')
                    ->on('productos')
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etapaproductos');
    }
};
