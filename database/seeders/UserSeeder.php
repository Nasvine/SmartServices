<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'email'                => "vinenassara@gmail.com",
            'password'             => bcrypt("vinenassara@gmail.com"),
            'role_id'              => 5,
        ]);
        $user = User::where('id', 1)->first();   
        $user->profile()->create([
            'first_name'      => "NASSARA",
            'last_name'       => "Kévine",
            'email'           => "vinassara@gmail.com",
            'sexe'            => "Masculin",
            'phone'           => "58343579",
            'adress'          => "",
            'photo'           => "",
        ]); 


        $user = User::create([
            'email'                => "client1@gmail.com",
            'password'             => bcrypt("client1@gmail.com"),
            'role_id'              => 3,
        ]);
        $user = User::where('id', 2)->first();   
        $user->profile()->create([
            'first_name'      => "Client",
            'last_name'       => "Client",
            'email'           => "client1@gmail.com",
            'sexe'            => "Masculin",
            'phone'           => "2569835",
            'adress'          => "",
            'photo'           => "",
        ]); 

        $user = User::create([
            'email'                => "livreur1@gmail.com",
            'password'             => bcrypt("livreur1@gmail.com"),
            'role_id'              => 4,
        ]);
        $user = User::where('id', 3)->first();   
        $user->livreur()->create([
            'first_name'      => "Livreur1",
            'last_name'       => "Livreur1",
            'email'           => "livreur1@gmail.com",
            'phone'           => "58343579",
            'adress'          => "",
            'photo'           => "",
        ]); 

        $user = User::create([
            'email'                => "gestionnaire@gmail.com",
            'password'             => bcrypt("gestionnaire@gmail.com"),
            'role_id'              => 2,
        ]);

        $user = User::where('id', 4)->first();   
        $user->profile()->create([
            'first_name'        => "Gestionnaire",
            'last_name'         => "Gestionnaire",
            'email'             => "gestionnaire@gmail.com",
            'sexe'              => "Masculin",
            'phone'             => "45897563",
            'adress'            => "",
            'photo'             => "",
        ]); 

        $user = User::create([
            'email'                => "gestionnaire1@anycourse.bj",
            'password'             => bcrypt("gestionnaire1@anycourse.bj"),
            'role_id'              => 2,
        ]);

        $user = User::where('id', 5)->first();   
        $user->profile()->create([
            'first_name'        => "Gestionnaire",
            'last_name'         => "Gestionnaire",
            'email'             => "gestionnaire1@anycourse.bj",
            'sexe'              => "Masculin",
            'phone'             => "45897563",
            'adress'            => "",
            'photo'             => "",
        ]); 

        $user = User::create([
            'email'                => "gestionnaire2@anycourse.bj",
            'password'             => bcrypt("gestionnaire2@anycourse.bj"),
            'role_id'              => 2,
        ]);

        $user = User::where('id', 6)->first();   
        $user->profile()->create([
            'first_name'        => "Gestionnaire",
            'last_name'         => "Gestionnaire",
            'email'             => "gestionnaire2@anycourse.bj",
            'sexe'              => "Masculin",
            'phone'             => "45897563",
            'adress'            => "",
            'photo'             => "",
        ]); 

        $user = User::create([
            'email'                => "admin1@gmail.com",
            'password'             => bcrypt("admin1@gmail.com"),
            'role_id'              => 1,
        ]);
        $user = User::where('id', 7)->first();   
        $user->profile()->create([
            'first_name'      => "Admin 1",
            'last_name'       => "Admin 1",
            'email'           => "admin1@gmail.com",
            'sexe'            => "Masculin",
            'phone'           => "98563245",
            'adress'          => "",
            'photo'           => "",
        ]); 

        $user = User::create([
            'email'                => "client2@gmail.com",
            'password'             => bcrypt("client2@gmail.com"),
            'role_id'              => 3,
        ]);
        $user = User::where('id', 8)->first();   
        $user->profile()->create([
            'first_name'      => "Client 2",
            'last_name'       => "Client 2",
            'email'           => "client2@gmail.com",
            'sexe'            => "Masculin",
            'phone'           => "58343579",
            'adress'          => "",
            'photo'           => "",
        ]); 
    }
}
