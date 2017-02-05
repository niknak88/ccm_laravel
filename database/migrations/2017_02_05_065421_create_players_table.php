<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('firstname');
            $table->string('lastname');
            $table->date('birthday');
            $table->string('city');
            $table->decimal('weight', 5, 2);
            $table->decimal('height', 5, 2);
            $table->string('avatar');
        });

        Schema::create('player_type', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('player_id')->index();
          $table->unsignedInteger('type_id')->index();
          $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
          $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
        });

      Schema::create('player_poste', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('player_id')->index();
        $table->unsignedInteger('poste_id')->index();
        $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
        $table->foreign('poste_id')->references('id')->on('postes')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('player_type', function(Blueprint $table) {
          $table->dropForeign('player_type_player_id_foreign');
          $table->dropForeign('player_type_type_id_foreign');
        });
        Schema::table('player_poste', function(Blueprint $table) {
          $table->dropForeign('player_poste_player_id_foreign');
          $table->dropForeign('player_poste_poste_id_foreign');
        });
        Schema::drop('player_type');
        Schema::drop('player_poste');
        Schema::drop('players');
    }
}
