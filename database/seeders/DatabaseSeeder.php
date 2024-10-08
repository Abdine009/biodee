<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    
    {
        $faker = \Faker\Factory::create('fr_FR'); // Utilise le français

        ini_set('memory_limit', '5024M'); // Augmente à 1 Go

         User::factory(10)->create([
            'password'=>'123456789 '
         ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::factory(5)->create([]);
        Product::factory(50)->create([]);

       // User::factory()->create([
            //'name' => 'Test User',
            //'email' => 'test@example.com',
            //'password' => Hash::make('password'), // Hacher le mot de passe

         //]);
    }
}
