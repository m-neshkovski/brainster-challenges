<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Player_team extends Pivot
{
    protected $fillable = [
        'player_id',
        'team_id',
    ];
}
