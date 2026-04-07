<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::firstOrCreate(
            ['email' => 'admin@electraize.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password'),
                'role' => 'admin'
            ]
        );

        // Categories
        $catPhones = Category::firstOrCreate(
            ['slug' => 'smartphones'],
            ['name' => 'Smartphones', 'description' => 'Mobile devices']
        );
        $catLaptops = Category::firstOrCreate(
            ['slug' => 'laptops'],
            ['name' => 'Laptops', 'description' => 'Portable computers']
        );

        // Brands
        $brandApple = Brand::firstOrCreate(
            ['slug' => 'apple'],
            ['name' => 'Apple']
        );
        $brandSamsung = Brand::firstOrCreate(
            ['slug' => 'samsung'],
            ['name' => 'Samsung']
        );

        // Products
        Product::firstOrCreate(
            ['slug' => 'iphone-14-pro-256gb'],
            [
                'category_id' => $catPhones->id,
                'brand_id' => $brandApple->id,
                'name' => 'iPhone 14 Pro - 256GB',
                'description' => 'The latest iPhone 14 Pro with dynamic island.',
                'price' => 999.00,
                'stock' => 50,
                'condition' => 'new',
                'image_url' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=500'
            ]
        );

        Product::firstOrCreate(
            ['slug' => 'macbook-pro-m2-14'],
            [
                'category_id' => $catLaptops->id,
                'brand_id' => $brandApple->id,
                'name' => 'MacBook Pro M2 - 14"',
                'description' => 'Supercharged by M2 Pro or M2 Max, MacBook Pro takes its power and efficiency further than ever.',
                'price' => 1999.00,
                'stock' => 15,
                'condition' => 'new',
                'image_url' => 'https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?w=500'
            ]
        );
        
        Product::firstOrCreate(
            ['slug' => 'samsung-galaxy-s23-ultra'],
            [
                'category_id' => $catPhones->id,
                'brand_id' => $brandSamsung->id,
                'name' => 'Samsung Galaxy S23 Ultra',
                'description' => 'Capture the night in low light like never before with Nightography.',
                'price' => 1199.00,
                'stock' => 20,
                'condition' => 'new',
                'image_url' => 'https://images.unsplash.com/photo-1610945415295-d9bbf067e59c?w=500'
            ]
        );
    }
}
