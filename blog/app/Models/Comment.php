<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment',
    ];

    public function themes() {
        return $this->belongsToMany(Theme::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
