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
        $catPhones = Category::firstOrCreate(['slug' => 'smartphones'], ['name' => 'Smartphones', 'description' => 'Mobile devices']);
        $catLaptops = Category::firstOrCreate(['slug' => 'laptops'], ['name' => 'Laptops', 'description' => 'Portable computers']);
        $catWatches = Category::firstOrCreate(['slug' => 'smartwatches'], ['name' => 'Smartwatches', 'description' => 'Wearable tech']);

        // Brands
        $brandApple = Brand::firstOrCreate(['slug' => 'apple'], ['name' => 'Apple']);
        $brandSamsung = Brand::firstOrCreate(['slug' => 'samsung'], ['name' => 'Samsung']);
        $brandDell = Brand::firstOrCreate(['slug' => 'dell'], ['name' => 'Dell']);

        // Products
        // We use updateOrCreate so it forces the new INR prices and images!
        Product::updateOrCreate(
            ['slug' => 'iphone-14-pro-256gb'],
            [
                'category_id' => $catPhones->id,
                'brand_id' => $brandApple->id,
                'name' => 'iPhone 14 Pro - 256GB',
                'description' => 'The latest iPhone 14 Pro with dynamic island.',
                'price' => 129900.00,
                'stock' => 50,
                'condition' => 'new',
                'image_url' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=500'
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'macbook-pro-m2-14'],
            [
                'category_id' => $catLaptops->id,
                'brand_id' => $brandApple->id,
                'name' => 'MacBook Pro M2 - 14"',
                'description' => 'Supercharged by M2 Pro or M2 Max, MacBook Pro.',
                'price' => 189900.00,
                'stock' => 15,
                'condition' => 'new',
                'image_url' => 'https://images.unsplash.com/photo-1611186871348-b1ce696e52c9?w=500'
            ]
        );
        
        Product::updateOrCreate(
            ['slug' => 'samsung-galaxy-s23-ultra'],
            [
                'category_id' => $catPhones->id,
                'brand_id' => $brandSamsung->id,
                'name' => 'Samsung Galaxy S23 Ultra',
                'description' => 'Capture the night in low light.',
                'price' => 114999.00,
                'stock' => 20,
                'condition' => 'new',
                'image_url' => 'https://images.unsplash.com/photo-1610945415295-d9bbf067e59c?w=500'
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'dell-xps-13'],
            [
                'category_id' => $catLaptops->id,
                'brand_id' => $brandDell->id,
                'name' => 'Dell XPS 13 Plus',
                'description' => 'Performance and design at its absolute peak.',
                'price' => 156900.00,
                'stock' => 10,
                'condition' => 'new',
                'image_url' => 'https://images.unsplash.com/photo-1593642632823-8f785ba67e45?w=500'
            ]
        );

        Product::updateOrCreate(
            ['slug' => 'apple-watch-ultra'],
            [
                'category_id' => $catWatches->id,
                'brand_id' => $brandApple->id,
                'name' => 'Apple Watch Ultra',
                'description' => 'The most rugged and capable Apple Watch ever.',
                'price' => 89900.00,
                'stock' => 30,
                'condition' => 'new',
                // Updated with an explicitly public watch image link
                'image_url' => 'https://images.unsplash.com/photo-1434494878577-86c23bcb06b9?auto=format&fit=crop&w=500&q=80'
            ]
        );
    }
}
