<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\User;
use App\Models\Usertype;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::where('usertype_id', Usertype::where('name', 'admin')->first()->id)->first()->id,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'dob' => $this->faker->dateTimeBetween('-48 years', '-18 years'),
        ];
    }
}
