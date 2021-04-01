<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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

        User::factory()->create([
            'role_id' => 1,
            'email' => 'admin@admin.com',
            'password' => Hash::make('Kumanovo1.'),
            'is_active' => true,
        ]);

        User::factory(10)->unverified()->create();
    }
}
