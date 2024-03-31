<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\PlatSeeder;
use Database\Seeders\ProduitSeeder;
use App\Models\admin\restaurant\Plat;
use App\Models\admin\boutique\Produit;
use Database\Seeders\RestaurantSeeder;
use App\Models\admin\boutique\Boutique;
use Database\Seeders\CategoryPlatSeeder;
use Database\Seeders\RolePermissionSeeder;
use App\Models\admin\restaurant\Restaurant;
use Database\Seeders\CategoryPlatRestaurantSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(UserSeeder::class);

        //  $this->call(RestaurantSeeder::class);
        //  $this->call(CategoryPlatSeeder::class);
        //  $this->call(PlatSeeder::class);

        //  $this->call(BoutiqueSeeder::class);
        //  $this->call(CategoryProduitSeeder::class);
        //  $this->call(ProduitSeeder::class);
         
         
         // $this->call(CategoryProduitSeeder::class);
         //  $this->call(CategoryPlatRestaurantSeeder::class);
        // $this->call(CategoryPlatSeeder::class);
        // Boutique::factory(10)->create();
        // Restaurant::factory(10)->create();
        // Plat::factory(20)->create();
        // Produit::factory(20)->create();
        
        //User::factory(2)->create();

    }
}
