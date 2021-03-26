<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run()
    {
        Team::factory(15)
            ->hasAttached(Player::factory()->count(20))
            ->create();
    }
}
