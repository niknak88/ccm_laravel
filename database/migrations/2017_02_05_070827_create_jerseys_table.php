<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJerseysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jerseys', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('number');
            $table->string('team');
            $table->unsignedInteger('player_id');
            $table->foreign('player_id')
                ->references('id')
                ->on('players')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jerseys', function(Blueprint $table) {
            $table->dropForeign('jerseys_player_id_foreign');
        });
        Schema::drop('jerseys');
    }
}
