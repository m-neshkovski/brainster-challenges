<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Kumanovo1.'),
        ]);
        
        for ($i=0; $i < 9; $i++) { 
            DB::table('projects')->insert([
                'user_id' => DB::table('users')->where('name', 'admin')->first()->id,
                'image_url' => 'https://i.insider.com/5fc0c218037cbd0018612897?width=700',
                'title' => 'Наслов на проектот',
                'subtitle' => 'Поднаслов на проектот',
                'desc' => 'Краток опис на проектот не подолг од 200 карактери'
            ]);
        }
    }
}
