<?php

namespace Database\Seeders;

use App\Models\admin\restaurant\Category_plat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryPlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category_plats = [
            [
             'id'         => 1,
             'name'       => 'Pizza',
             'lienPhoto'  => 'category_plats_1.jpeg',
            ],
            [
             'id'    => 2,
             'name'  => 'Plats africains',
             'lienPhoto'  => 'category_plats_2.jpeg',
            ],
            [
             'id'    => 3,
             'name'  => 'Plats française',
             'lienPhoto'  => 'category_plats_3.jpeg',
            ],
            [
             'id'    => 4,
             'name'  => 'Plats végétariens',
             'lienPhoto'  => 'category_plats_4.jpeg',
            ],
         ];
         
         Category_plat::insert($category_plats);
    }
}
