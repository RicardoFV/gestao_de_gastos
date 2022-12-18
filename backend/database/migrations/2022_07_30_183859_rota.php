<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rotas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('caminho');
            $table->string('acao');
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
        Schema::table('rotas', function (Blueprint $table) {

            $table->dropSoftDeletes();
        });
    }
}
