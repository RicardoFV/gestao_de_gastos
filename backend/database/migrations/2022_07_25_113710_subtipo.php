<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subtipo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')
                ->references('id')->on('tipos');
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
        Schema::table('subtipos', function (Blueprint $table) {

            $table->dropSoftDeletes();
        });
    }
}
