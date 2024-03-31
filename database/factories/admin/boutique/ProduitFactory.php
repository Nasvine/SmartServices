<?php

namespace Database\Factories\admin\boutique;

use App\Models\admin\boutique\Boutique;
use App\Models\admin\boutique\Category_produit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produit>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom_produit' => $this->faker->name(),
            'description' => $this->faker->paragraph(1),
            'lienPhoto' => $this->faker->image('public/boutiques/produits/images', 640, 480, null, false),
            'prix' => $this->faker->numberBetween(1500,3000),
            'boutique_id'=> Boutique::get()->random()->id ,
            'category_produit_id' => Category_produit::get()->random()->id,
        ];
    }
}
