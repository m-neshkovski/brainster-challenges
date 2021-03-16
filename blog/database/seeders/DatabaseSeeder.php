<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Theme;
use App\Models\Usertype;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(10)
            ->has(Theme::factory()
                        ->count(rand(5, 10))
                        ->hasAttached(Comment::factory()
                                    ->count(rand(2, 10))
                                    ->hasAttached(User::factory(1)))
                        )
            ->create();
    }
}
