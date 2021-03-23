<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usertype;
use Illuminate\Database\Seeder;
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
        // create the admin
        User::factory()->create([
            'usertype_id' => Usertype::where('name', 'admin')->first()->id,
            'email' => 'admin@admin.com',
            'password' => Hash::make('Kumanovo1.'),
        ]);
        
        User::factory(10)->create();

        $this->call([
            TeamSeeder::class,
        ]);
    }
}
