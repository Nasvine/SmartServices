<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\admin\roles\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::find(1);
        $role->permissions()->attach([2,7]);

        $role = Role::find(2);
        $role->permissions()->attach([3,8]);

        $role = Role::find(3);
        $role->permissions()->attach([4,9]);

        $role = Role::find(4);
        $role->permissions()->attach([5,10]);

        $role = Role::find(5);
        $role->permissions()->attach([1,6]);
    }
}
