<?php

namespace Database\Factories\admin\restaurant;

use App\Models\admin\restaurant\Category_plat;
use App\Models\admin\restaurant\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin\restaurant\Plat>
 */
class PlatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name(),
            'description' => $this->faker->paragraph(1),
            'lienPhoto' => $this->faker->image('public/restaurants/plats/images', 640, 480, null, false),
            'prix' => $this->faker->numberBetween(1500,3000),
            'restaurant_id'=> Restaurant::get()->random()->id ,
            'category_plat_id' => Category_plat::get()->random()->id,
        ];
    }
}
