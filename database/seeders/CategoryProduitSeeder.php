<?php

namespace Database\Seeders;

use App\Models\admin\boutique\Category_produit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category_produits = [
            [
             'id'         => 1,
             'name'       => 'Vêtements et accessoires',
             'lienPhoto'  => 'category_produits_1.jpeg',
            ],
            [
             'id'    => 2,
             'name'  => 'Électronique grand public',
             'lienPhoto'  => 'category_produits_2.jpeg',
            ],
            [
             'id'    => 3,
             'name'  => 'Produits de beauté et soins personnels',
             'lienPhoto'  => 'category_produits_3.jpeg',
            ],
            [
             'id'    => 4,
             'name'  => 'Maison et décoration',
             'lienPhoto'  => 'category_produits_4.jpeg',
            ],
         ];
         
         Category_produit::insert($category_produits);
    }
}
