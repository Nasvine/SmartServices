<?php

namespace Database\Seeders;

use App\Models\admin\restaurant\Category_plat;
use App\Models\admin\restaurant\Plat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  
        $plat = Plat::create([
            'id'    => 1,
            'nom'                  => "Frittes",
            'description'          => "At tempore illo adipisci eos.",
            'prix'                 => 2000,
            'restaurant_id'        => 1,
            'category_plat_id'     => 2,
            'lienPhoto'            => "Plat_1.jpeg",
            
        ]);

        $plat = Plat::create([
            'id'    => 2,
            'nom'                  => "Sharwama",
            'description'          => "Sit qui tempore et molestias doloremque aperiam. Cumque veritatis molestias tempore enim necessitatibus.",
            'prix'                 => 1000,
            'restaurant_id'        => 2,
            'category_plat_id'     => 2,
            'lienPhoto'            => "Plat_2.jpeg",
            
        ]);

        $plat = Plat::create([
            'id'    => 3,
            'nom'                  => "Humberger",
            'description'          => "Doloribus magnam sapiente voluptatem adipisci inventore enim assumenda ab. Adipisci id dolorem rem aut.",
            'prix'                 => 5000,
            'restaurant_id'        => 3,
            'category_plat_id'     => 1,
            'lienPhoto'            => "Plat_3.jpeg",
            
        ]);

        $plat = Plat::create([
            'id'    => 4,
            'nom'                  => "Soupe",
            'description'          => "Doloribus magnam sapiente voluptatem adipisci invento.",
            'prix'                 => 2000,
            'restaurant_id'        => 1,
            'category_plat_id'     => 1,
            'lienPhoto'            => "Plat_4.jpeg",
            
        ]);

        $plat = Plat::create([
            'id'    => 5,
            'nom'                  => "Nikita",
            'description'          => "Doloribus magnam sapiente voluptatem adipisci invento.",
            'prix'                 => 2000,
            'restaurant_id'        => 2,
            'category_plat_id'     => 3,
            'lienPhoto'            => "Plat_5.jpeg",
            
        ]);

        $plat = Plat::create([
            'id'    => 6,
            'nom'                  => "Rhett Nader",
            'description'          => "Et fuga debitis quia est hic qui commodi. Et omnis non aperiam quae harum quidem.",
            'prix'                 => 1000,
            'restaurant_id'        => 3,
            'category_plat_id'     => 3,
            'lienPhoto'            => "Plat_6.jpeg",
            
        ]);

        $plat = Plat::create([
            'id'    => 7,
            'nom'                  => "Erin Davis",
            'description'          => "Guia est hic qui commodi. Et omnis non aperiam quae harum quidem.",
            'prix'                 => 1000,
            'restaurant_id'        => 4,
            'category_plat_id'     => 4,
            'lienPhoto'            => "Plat_7.jpeg",
            
        ]);

        $plat = Plat::create([
            'id'    => 8,
            'nom'                  => "Nikita Skiles",
            'description'          => "Odit vel minima sed aut inventore labore.",
            'prix'                 => 2500,
            'restaurant_id'        => 4,
            'category_plat_id'     => 4,
            'lienPhoto'            => "Plat_8.jpeg",
            
        ]);

       
    }
}
