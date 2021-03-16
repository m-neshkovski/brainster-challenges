<?php

namespace Database\Factories;

use App\Models\Theme;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThemeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Theme::class;

    /**
    public/img/3adlsTYsSRQwujmRTkIwSdQIpjlM5zxVS9u5eAmZ.jpg
    public/img/A0GYvWP3nMdELTT53Q69jeJEgHXklFdg9mRDVhE6.jpg
    public/img/D4HELp3eU4gPhGrBE5AKT6ueqfD2riAVjrli5egQ.jpg
    public/img/dLthehgF7bftXaqK56aXHHjZGtskAJZnc4I2ThVc.jpg
    public/img/w2qjcRtWM5JmTvy5xORg27WqcPCz8M5nzUz6Ek84.jpg
    public/img/wijUCLSL5XcwJUgy9qS0rUhTvRGJ2FmSKIXFl6JF.jpg
    
    
    */
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $images = [
            'public/img/3adlsTYsSRQwujmRTkIwSdQIpjlM5zxVS9u5eAmZ.jpg',
            'public/img/A0GYvWP3nMdELTT53Q69jeJEgHXklFdg9mRDVhE6.jpg',
            'public/img/D4HELp3eU4gPhGrBE5AKT6ueqfD2riAVjrli5egQ.jpg',
            'public/img/dLthehgF7bftXaqK56aXHHjZGtskAJZnc4I2ThVc.jpg',
            'public/img/w2qjcRtWM5JmTvy5xORg27WqcPCz8M5nzUz6Ek84.jpg',
            'public/img/wijUCLSL5XcwJUgy9qS0rUhTvRGJ2FmSKIXFl6JF.jpg',
        ];
        return [
            'user_id' => rand(1, count(User::all())),
            'category_id' => rand(1, count(Category::all())),
            'title' => $this->faker->sentence,
            'image' => $images[array_rand($images)],
            'description' => $this->faker->sentences(5, true),
            'is_approved' => array_rand([true, false]),
        ];
    }
}
