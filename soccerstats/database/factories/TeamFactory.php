<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use App\Models\Usertype;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'user_id' => User::where('usertype_id', Usertype::where('name', 'admin')->first()->id)->first()->id,
            'name' => $this->faker->firstName,
            'year_founded' => strval(rand(1900, 2021)),
        ];
    }
}
