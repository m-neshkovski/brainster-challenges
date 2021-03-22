<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'dob',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function team() {
        return $this->belongsToMany(Team::class, 'player_team');
    }

    public function matches() {
        return $this->belongsToMany(SMatch::class, 'match_player');
    }
}
