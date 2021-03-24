<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'year_founded',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function players() {
        return $this->belongsToMany(Player::class, 'player_team');
    }

    public function homeMatches() {
        return $this->hasMany(Game::class, 'home_team');
    }

    public function awayMatches() {
        return $this->hasMany(Game::class, 'guest_team');
    }
}
