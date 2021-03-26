<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('home_team');
                $table->unsignedBigInteger('guest_team');
                $table->dateTime('schaduled_at');
                $table->smallInteger('home_score')->nullable()->default(null);
                $table->smallInteger('guest_score')->nullable()->default(null);
                $table->boolean('is_finished')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('home_team')->references('id')->on('teams')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('guest_team')->references('id')->on('teams')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
}
