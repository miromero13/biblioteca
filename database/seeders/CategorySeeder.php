<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Ficción', 'image' => 'https://via.placeholder.com/400x250/FF5733/FFFFFF?text=Ficcion']);
        Category::create(['name' => 'Ciencia', 'image' => 'https://via.placeholder.com/400x250/33FF57/FFFFFF?text=Ciencia']);
        Category::create(['name' => 'Historia', 'image' => 'https://via.placeholder.com/400x250/3357FF/FFFFFF?text=Historia']);
        Category::create(['name' => 'Infantil', 'image' => 'https://via.placeholder.com/400x250/F733FF/FFFFFF?text=Infantil']);
    }
}