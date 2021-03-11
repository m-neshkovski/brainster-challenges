<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Usertype;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // DB::table('usertypes')->insert([
        //     ['type' => 'admin'],
        //     ['type' => 'bloger'],
        // ]);

        Usertype::create([
            'type' => 'admin',
            'type' => 'bloger',
        ]);

        User::create([
            'name' => 'Administrator',
            'email' => 'admin@blog.com',
            'password' => Hash::make('Kumanovo1.'),
            'usertype_id' => Usertype::where('type', 'admin')->first()->id,
        ]);

        CategorySeeder::class;


    }
}
