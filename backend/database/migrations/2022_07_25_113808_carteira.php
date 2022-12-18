<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Carteira extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carteiras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->date('vencimento');
            $table->decimal('valor', 10, 0);
            $table->string('descricao');
            $table->boolean('repeti')->default(0);
            $table->integer('quantidade')->default(0);
            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')
                ->references('id')->on('tipos');
            $table->integer('subtipo_id')->unsigned();
            $table->foreign('subtipo_id')
                ->references('id')->on('subtipos');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')
                ->references('id')->on('usuarios');
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
        Schema::table('carteiras', function (Blueprint $table) {

            $table->dropSoftDeletes();
        });
    }
}
