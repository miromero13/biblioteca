<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ficcion = Category::where('name', 'Ficción')->first();
        $ciencia = Category::where('name', 'Ciencia')->first();
        $historia = Category::where('name', 'Historia')->first();
        $infantil = Category::where('name', 'Infantil')->first();

        if ($ficcion) {
            Subcategory::create(['category_id' => $ficcion->id, 'name' => 'Novela']);
            Subcategory::create(['category_id' => $ficcion->id, 'name' => 'Cuentos']);
        }
        if ($ciencia) {
            Subcategory::create(['category_id' => $ciencia->id, 'name' => 'Física']);
            Subcategory::create(['category_id' => $ciencia->id, 'name' => 'Biología']);
        }
        if ($historia) {
            Subcategory::create(['category_id' => $historia->id, 'name' => 'Antigua']);
            Subcategory::create(['category_id' => $historia->id, 'name' => 'Moderna']);
        }
        if ($infantil) {
            Subcategory::create(['category_id' => $infantil->id, 'name' => 'Cuentos de Hadas']);
            Subcategory::create(['category_id' => $infantil->id, 'name' => 'Educativos']);
        }
    }
}