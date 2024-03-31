<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\admin\boutique\Category_produit;
use App\Models\admin\boutique\Produit;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  
        $produit = Produit::create([
            'id'    => 1,
            'nom_produit'          => "Dolor",
            'description'          => "At tempore illo adipisci eos.",
            'prix'                 => 2000,
            'boutique_id'          => 1,
            'category_produit_id'     => 2,
            'lienPhoto'            => "Produit_1.jpeg",
            
        ]);

        $produit = Produit::create([
            'id'    => 2,
            'nom_produit'          => "Blanditiis",
            'description'          => "Sit qui tempore et molestias doloremque aperiam. Cumque veritatis molestias tempore enim necessitatibus.",
            'prix'                 => 1000,
            'boutique_id'        => 2,
            'category_produit_id'     => 2,
            'lienPhoto'            => "Produit_2.jpeg",
            
        ]);

        $produit = Produit::create([
            'id'    => 3,
            'nom_produit'                  => "Consequatur",
            'description'          => "Doloribus magnam sapiente voluptatem adipisci inventore enim assumenda ab. Adipisci id dolorem rem aut.",
            'prix'                 => 5000,
            'boutique_id'        => 3,
            'category_produit_id'     => 1,
            'lienPhoto'            => "Produit_3.jpeg",
            
        ]);

        $produit = Produit::create([
            'id'    => 4,
            'nom_produit'                  => "Suscipit",
            'description'          => "Doloribus magnam sapiente voluptatem adipisci invento.",
            'prix'                 => 2000,
            'boutique_id'        => 1,
            'category_produit_id'     => 1,
            'lienPhoto'            => "Produit_4.jpeg",
            
        ]);

        $produit = Produit::create([
            'id'    => 5,
            'nom_produit'                  => "Voluptates",
            'description'          => "Doloribus magnam sapiente voluptatem adipisci invento.",
            'prix'                 => 2000,
            'boutique_id'        => 2,
            'category_produit_id'     => 3,
            'lienPhoto'            => "Produit_5.jpeg",
            
        ]);

        $produit = Produit::create([
            'id'    => 6,
            'nom_produit'                  => "Laborum",
            'description'          => "Et fuga debitis quia est hic qui commodi. Et omnis non aperiam quae harum quidem.",
            'prix'                 => 1000,
            'boutique_id'        => 3,
            'category_produit_id'     => 3,
            'lienPhoto'            => "Produit_6.jpeg",
            
        ]);

        $produit = Produit::create([
            'id'    => 7,
            'nom_produit'                  => "Erin Davis",
            'description'          => "Guia est hic qui commodi. Et omnis non aperiam quae harum quidem.",
            'prix'                 => 1000,
            'boutique_id'        => 4,
            'category_produit_id'     => 4,
            'lienPhoto'            => "Produit_7.jpeg",
            
        ]);

        $produit = Produit::create([
            'id'    => 8,
            'nom_produit'                  => " Adipisicing",
            'description'          => "Odit vel minima sed aut inventore labore.",
            'prix'                 => 2500,
            'boutique_id'        => 4,
            'category_produit_id'     => 4,
            'lienPhoto'            => "Produit_8.jpeg",
            
        ]);

       
    }
}
