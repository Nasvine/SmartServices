<?php

namespace Database\Factories\admin\restaurant;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\restaurant\Restaurant>
 */
class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom_restaurant' => $this->faker->name(),
            'adresse_restaurant' => $this->faker->address(),
            'telephone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'ville' => $this->faker->city(),
            'description' => $this->faker->paragraph(1),
            'user_id' => User::get()->random()->id,
            'photo' => $this->faker->image('public/restaurants/images', 640, 480, null, false),
        ];
    }
}
