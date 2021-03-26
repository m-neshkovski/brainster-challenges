<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Team;
use App\Models\Game_player;
use Illuminate\Support\Facades\Artisan;

class GameSeeder extends Seeder
{
    public function run()
    {
        $games = Game::factory(20)->create();
        foreach($games as $game) {
            foreach(Team::find($game->home_team)->players as $player) {
                Game_player::create([
                    'game_id' => $game->id,
                    'player_id' => $player->id,
                ]);
            }
            foreach(Team::find($game->guest_team)->players as $player) {
                Game_player::create([
                    'game_id' => $game->id,
                    'player_id' => $player->id,
                ]);
            }
        }
        // komanda za zavrseni natprevari ista i vo cron
        Artisan::call('soccer:finished');
    }
}