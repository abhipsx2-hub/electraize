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
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@electraize.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        // Categories
        $catPhones = Category::create(['name' => 'Smartphones', 'slug' => 'smartphones', 'description' => 'Mobile devices']);
        $catLaptops = Category::create(['name' => 'Laptops', 'slug' => 'laptops', 'description' => 'Portable computers']);

        // Brands
        $brandApple = Brand::create(['name' => 'Apple', 'slug' => 'apple']);
        $brandSamsung = Brand::create(['name' => 'Samsung', 'slug' => 'samsung']);

        // Products
        Product::create([
            'category_id' => $catPhones->id,
            'brand_id' => $brandApple->id,
            'name' => 'iPhone 14 Pro - 256GB',
            'slug' => 'iphone-14-pro-256gb',
            'description' => 'The latest iPhone 14 Pro with dynamic island.',
            'price' => 999.00,
            'stock' => 50,
            'condition' => 'new',
            'image_url' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=500'
        ]);

        Product::create([
            'category_id' => $catLaptops->id,
            'brand_id' => $brandApple->id,
            'name' => 'MacBook Pro M2 - 14"',
            'slug' => 'macbook-pro-m2-14',
            'description' => 'Supercharged by M2 Pro or M2 Max, MacBook Pro takes its power and efficiency further than ever.',
            'price' => 1999.00,
            'stock' => 15,
            'condition' => 'new',
            'image_url' => 'https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?w=500'
        ]);
        
        Product::create([
            'category_id' => $catPhones->id,
            'brand_id' => $brandSamsung->id,
            'name' => 'Samsung Galaxy S23 Ultra',
            'slug' => 'samsung-galaxy-s23-ultra',
            'description' => 'Capture the night in low light like never before with Nightography.',
            'price' => 1199.00,
            'stock' => 20,
            'condition' => 'new',
            'image_url' => 'https://images.unsplash.com/photo-1610945415295-d9bbf067e59c?w=500'
        ]);
    }
}
