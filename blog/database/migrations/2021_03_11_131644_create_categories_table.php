<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
                $table->string('name');
            $table->timestamps();
        });

        $categories = [
            'General',
            'Fun',
            'Sport',
            'Movies',
            'Politics',
            'Cars',
        ];

        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
