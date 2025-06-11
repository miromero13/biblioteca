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
        Category::create(['name' => 'Ficción', 'image' => 'https://img.freepik.com/vector-premium/astronauta-personaje-dibujos-animados-bola-luna-ciencia-ficcion-aislada_138676-3186.jpg']);
        Category::create(['name' => 'Ciencia', 'image' => 'https://i.pinimg.com/736x/61/f4/33/61f4339ef1097f10274028b25c7137b7.jpg']);
        Category::create(['name' => 'Historia', 'image' => 'https://www.lifeder.com/wp-content/uploads/2021/06/Orange-and-Yellow-Illustrated-International-Museum-Day-Social-Media-Poster.jpg']);
        Category::create(['name' => 'Infantil', 'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuG1KiKsYg9-gmeilSkRlWfa_ohGf0jKv3qw&s']);
    }
}