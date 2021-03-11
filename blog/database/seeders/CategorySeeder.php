<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'General',
            'name' => 'Fun',
            'name' => 'Sport',
            'name' => 'Movies',
            'name' => 'Politics',
            'name' => 'Cars',
        ]);
    }
}
