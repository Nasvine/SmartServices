<?php

namespace Database\Seeders;

use App\Models\admin\restaurant\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryPlatRestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurant = Restaurant::find(1);
        $restaurant->category_plats()->attach([2,1]);

        $restaurant = Restaurant::find(2);
        $restaurant->category_plats()->attach([2,1,3]);

        $restaurant = Restaurant::find(3);
        $restaurant->category_plats()->attach([2,1, 3]);

        $restaurant = Restaurant::find(4);
        $restaurant->category_plats()->attach([4]);
    }
}
