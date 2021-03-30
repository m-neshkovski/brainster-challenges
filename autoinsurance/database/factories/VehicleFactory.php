<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;
use \Faker\Provider\Fakecar;


class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = (new \Faker\Factory())::create();
        $faker->addProvider(new Fakecar($faker));
        return [
            'brand' => $faker->vehicleBrand,
            'model' => $faker->vehicleModel,
            'plate_number' => $faker->vehicleRegistration('[A-Z]{2}-[0-9]{4}-[A-Z]{2}'),
            'insurance_date' => $this->faker->dateTimeThisYear,
        ];
    }
}
