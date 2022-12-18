<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Permissaorota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissao_rota', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('perfil_id')->unsigned();
            $table->foreign('perfil_id')
                ->references('id')->on('perfils');
            $table->integer('rota_id')->unsigned();
            $table->foreign('rota_id')
                ->references('id')->on('rotas');
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
        Schema::dropIfExists('permissao_rota');
    }
}
