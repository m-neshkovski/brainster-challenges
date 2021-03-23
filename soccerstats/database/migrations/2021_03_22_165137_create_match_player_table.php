<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchPlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_player', function (Blueprint $table) {
            $table->id();
                $table->unsignedBigInteger('match_id');
                $table->unsignedBigInteger('player_id');
                $table->boolean('has_played')->default(false);
            $table->timestamps();

            $table->foreign('match_id')->references('id')->on('matches')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('player_id')->references('id')->on('players')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_player');
    }
}
