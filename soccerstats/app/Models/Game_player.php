<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Game_player extends Pivot
{
    protected $fillable = [
        'game_id',
        'player_id',
        'has_played',
    ];
}
