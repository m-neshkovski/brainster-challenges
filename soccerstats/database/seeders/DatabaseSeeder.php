<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usertype;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'usertype_id' => Usertype::where('name', 'admin')->first()->id,
            'email' => 'admin@admin.com',
            'password' => Hash::make('Kumanovo1.'),
        ]);
        User::factory(10)->create();
        $this->call([
            TeamSeeder::class,
            GameSeeder::class,
        ]);
    }
}
