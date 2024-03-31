<?php

namespace Database\Seeders;

use App\Models\admin\restaurant\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurant = Restaurant::create([
            'id'    => 1,
            'nom_restaurant'       => "Restanrant 1",
            'adresse_restaurant'   => "Cotonou",
            'telephone'            => 229256487268,
            'email'                => "restaurant1@gmail.com",
            'ville'                => "Cotonou",
            'description'          => "At tempore illo adipisci eos.",
            'photo'                => "restaurant001.jpeg",
            'user_id'              => 6,
        ]);
        
        $restaurant = Restaurant::create([
            'id'    => 2,
            'nom_restaurant'       => "Restanrant 2",
            'adresse_restaurant'   => "Calavi",
            'telephone'            => 78996222.,
            'email'                => "restaurant2@gmail.com",
            'ville'                => "Calavi",
            'description'          => "Quasi quo temporibus sed in recusandae voluptate sequi quia.",
            'photo'                => "restaurant002.jpeg",
            'user_id'              => 6,
        ]);

        $restaurant = Restaurant::create([
            'id'    => 3,
            'nom_restaurant'       => "Restanrant 3",
            'adresse_restaurant'   => "Cotonou",
            'telephone'            => 78996222.,
            'email'                => "restaurant3@gmail.com",
            'ville'                => "Porto-Novo",
            'description'          => "Est iure vero est ut ut qui.",
            'photo'                => "restaurant003.jpeg",
            'user_id'              => 6,
        ]);

        $restaurant = Restaurant::create([
            'id'    => 4,
            'nom_restaurant'       => "Restanrant 4",
            'adresse_restaurant'   => "Ouidah",
            'telephone'            => 78996222.,
            'email'                => "restaurant4@gmail.com",
            'ville'                => "Ouidah",
            'description'          => "Nostrum molestiae omnis velit.",
            'photo'                => "restaurant004.jpeg",
            'user_id'              => 6,
        ]);
        
    }
}
