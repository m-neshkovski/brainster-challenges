<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SMatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'home_team',
        'guest_team',
        'schaduled_at',
        'home_score',
        'guest_score',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function homeTeam() {
        return $this->belongsTo(Team::class);
    }

    public function guestTeam() {
        return $this->belongsTo(Team::class);
    }

    public function players() {
        return $this->belongsToMany(Player::class, 'match_player');
    }
}
