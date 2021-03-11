<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentThemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_theme', function (Blueprint $table) {
            $table->id();
                $table->unsignedBigInteger('comment_id');
                $table->unsignedBigInteger('theme_id');

                $table->foreign('comment_id')->references('id')->on('comments');
                $table->foreign('theme_id')->references('id')->on('themes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_theme');
    }
}
