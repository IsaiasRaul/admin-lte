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
        Schema::table('users', function (Blueprint $table) {
        
            $table->unsignedBigInteger('id_municipalidad')->nullable()->after('password');

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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_id_municipalidad_foreign');
            $table->dropIndex('users_id_municipalidad_foreign');
            $table->dropColumn('id_municipalidad');            
        });
    }
};
