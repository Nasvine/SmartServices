<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\admin\permissions\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
               [
                'id'    => 1,
                'name'  => 'sidebar_super_admin',
               ],
               [
                'id'    => 2,
                'name'  => 'sidebar_admin',
               ],
               [
                'id'    => 3,
                'name'  => 'sidebar_gestionnaire',
               ],
               [
                'id'    => 4,
                'name'  => 'sidebar_client',
               ],
               [
                'id'    => 5,
                'name'  => 'sidebar_livreur',
               ],
               [
                'id'    => 6,
                'name'  => 'navbar_super_admin',
               ],
               [
                'id'    => 7,
                'name'  => 'navbar_admin',
               ],
               [
                'id'    => 8,
                'name'  => 'navbar_gestionnaire',
               ],
               [
                'id'    => 9,
                'name'  => 'navbar_client',
               ],
               [
                'id'    => 10,
                'name'  => 'navbar_livreur',
               ],
         ];
         
         Permission::insert($permissions);
    }
}
