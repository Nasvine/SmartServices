<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\admin\roles\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
             'id'    => 1,
             'name'  => 'Admin',
            ],
            [
             'id'    => 2,
             'name'  => 'Gestionnaire Commande',
            ],
            [
             'id'    => 3,
             'name'  => 'Client',
            ],
            [
             'id'    => 4,
             'name'  => 'Livreur',
            ],
            [
             'id'    => 5,
             'name_of_role'  => 'Super Admin',
            ]
         ];
         
         Role::insert($roles);
    }
}
