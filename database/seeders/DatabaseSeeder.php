<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);
            
        User::create([
            "name" => "Taartely",
            "username" => "taartely",
            "email" => "taartely@gmail.com",
            "address" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore, corrupti adipisci eligendi totam sit repellendus libero cupiditate expedita eum necessitatibus?",
            "is_seller" => 1,
            "password" => bcrypt("password")
        ]);
        User::create([
            "name" => "ivantans",
            "username" => "ivantans",
            "email" => "ivantanjaya@gmail.com",
            "address" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tempore, corrupti adipisci eligendi totam sit repellendus libero cupiditate expedita eum necessitatibus?",
            "password" => bcrypt("password")
        ]);
            
        User::factory(10)->create();
        Product::factory(20)->create();

        Category::create([
            "name" => "Pudding",
            "slug" => "pudding"
        ]);

        Category::create([
            "name" => "Kids Cake",
            "slug" => "kids-cake"
        ]);

        Category::create([
            "name" => "Desert",
            "slug" => "desert"
        ]);

        Cart::factory(100)->create();
    }
}
