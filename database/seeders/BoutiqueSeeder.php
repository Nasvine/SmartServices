<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\admin\boutique\Boutique;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BoutiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $boutique = Boutique::create([
            'id'    => 1,
            'nom_boutique'       => "QUENY Store",
            'adresse_boutique'   => "Finagnon",
            'telephone'            => 229256487268,
            'email'                => "boutique1@gmail.com",
            'ville'                => "Cotonou",
            'description'          => "At tempore illo adipisci eos.",
            'photo'                => "boutique001.jpeg",
            'user_id'              => 6,
        ]);
        
        $boutique = Boutique::create([
            'id'    => 2,
            'nom_boutique'       => "Shop sans soucis",
            'adresse_boutique'   => "Calavi",
            'telephone'            => 78996222.,
            'email'                => "boutique2@gmail.com",
            'ville'                => "Calavi",
            'description'          => "Quasi quo temporibus sed in recusandae voluptate sequi quia.",
            'photo'                => "boutique002.jpg",
            'user_id'              => 6,
        ]);

        $boutique = Boutique::create([
            'id'    => 3,
            'nom_boutique'       => "Maven",
            'adresse_boutique'   => "Cotonou",
            'telephone'            => 78996222.,
            'email'                => "boutique3@gmail.com",
            'ville'                => "Porto-Novo",
            'description'          => "Est iure vero est ut ut qui.",
            'photo'                => "boutique003.jpeg",
            'user_id'              => 6,
        ]);

        $boutique = Boutique::create([
            'id'    => 4,
            'nom_boutique'       => "Hourrus",
            'adresse_boutique'   => "Ouidah",
            'telephone'            => 78996222.,
            'email'                => "boutique4@gmail.com",
            'ville'                => "Ouidah",
            'description'          => "Nostrum molestiae omnis velit.",
            'photo'                => "boutique004.jpg",
            'user_id'              => 6,
        ]);
        
    }
}
