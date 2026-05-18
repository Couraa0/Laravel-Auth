<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Membuat akun Super Admin setiap kali seeding dijalankan
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'password' => 'password123',
        ]);

        // 2. Membuat 5 data kategori acak
        Category::factory(5)->create();
        // 3. Membuat 50 data produk acak
        Product::factory(50)->create();
    }
}
