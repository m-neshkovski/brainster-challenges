<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchPlayerTable extends Migration
{
    public function up()
    {
        Schema::create('game_player', function (Blueprint $table) {
            $table->id();
                $table->unsignedBigInteger('game_id');
                $table->unsignedBigInteger('player_id');
                $table->boolean('has_played')->default(false);
            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('games')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('player_id')->references('id')->on('players')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('game_player');
    }
}
