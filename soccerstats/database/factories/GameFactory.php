<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usertype;
use App\Models\User;
use App\Models\Team;

class GameFactory extends Factory
{
    protected $model = Game::class;

    public function definition()
    {
        $teams_id_arr = Team::all()->pluck('id');
        $home_id = $teams_id_arr[rand(0, count($teams_id_arr)-1)];
        $guest_id = $teams_id_arr[rand(0, count($teams_id_arr)-1)];
        while($home_id == $guest_id) {
            $guest_id = $teams_id_arr[rand(0, count($teams_id_arr)-1)];
        }
        return [
            'user_id' => User::where('usertype_id', Usertype::where('name', 'admin')->first()->id)->first()->id,
            'home_team' => $home_id,
            'guest_team' => $guest_id,
            'schaduled_at' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'is_finished' => false,
        ];
    }
}
