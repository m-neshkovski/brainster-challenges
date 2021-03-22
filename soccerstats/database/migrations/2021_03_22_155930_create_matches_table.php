<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('home_team');
                $table->unsignedBigInteger('guest_team');
                $table->dateTime('schaduled_at');
                $table->smallInteger('home_score')->nullable()->default(null);
                $table->smallInteger('guest_score')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('home_team')->references('id')->on('teams');
            $table->foreign('guest_team')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
