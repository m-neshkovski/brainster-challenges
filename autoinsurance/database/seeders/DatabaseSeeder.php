<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => Hash::make('Kumanovo1.'), 
        ]);

        User::factory(10)->create();

        $this->call([
            VehicleSeeder::class,
        ]);
    }
}
