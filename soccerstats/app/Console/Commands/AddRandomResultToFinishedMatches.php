<?php

namespace App\Console\Commands;

use App\Models\Game;
use App\Models\Game_player;
use Illuminate\Console\Command;

class AddRandomResultToFinishedMatches extends Command
{

    protected $signature = 'soccer:finished';

    protected $description = 'Generates random result to matches schaduled before now.';

    public function handle()
    {
        $games = Game::where('is_finished', false)->get();
        foreach($games as $game) {
            if(strtotime($game->schaduled_at) < time()) {
                $game->is_finished = true;
                $game->home_score = rand(0, 5);
                $game->guest_score = rand(0, 5);
                foreach($game->homeTeam->players()->limit(14)->get() as $player) {
                    Game_player::where('game_id', $game->id)->where('player_id', $player->id)->update([
                        'has_played' => true,
                    ]);
                }
                foreach($game->guestTeam->players()->limit(14)->get() as $player) {
                    Game_player::where('game_id', $game->id)->where('player_id', $player->id)->update([
                        'has_played' => true,
                    ]);
                }
                $game->save();
            }
        }
        return 1;
    }
}
