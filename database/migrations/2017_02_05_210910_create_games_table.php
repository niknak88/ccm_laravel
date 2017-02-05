<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedTinyInteger('score_a');
            $table->unsignedTinyInteger('score_b');
            $table->dateTime('date');
            $table->boolean('ccm_game');
            $table->unsignedInteger('team_id_a');
            $table->unsignedInteger('team_id_b');
            $table->unsignedInteger('place_id');
            $table->foreign('place_id')->references('id')->on('places');
            $table->foreign('team_id_a')->references('id')->on('teams');
            $table->foreign('team_id_b')->references('id')->on('teams');
        });

      Schema::create('game_type', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('game_id')->index();
        $table->unsignedInteger('type_id')->index();
        $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
        $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game_type', function(Blueprint $table) {
            $table->dropForeign('game_type_game_id_foreign');
            $table->dropForeign('game_type_type_id_foreign');
        });
        Schema::drop('game_type');
        Schema::drop('games');
    }
}
