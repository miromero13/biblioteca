<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $novela = Subcategory::where('name', 'Novela')->first();
        $fisica = Subcategory::where('name', 'Física')->first();
        $cuentos = Subcategory::where('name', 'Cuentos')->first();

        if ($novela) {
            Book::create([
                'subcategory_id' => $novela->id,
                'code' => 'N001',
                'quantity' => 5,
                'title' => 'Cien Años de Soledad',
                'author' => 'Gabriel García Márquez',
                'editorial' => 'Sudamericana',
                'year' => 1967,
            ]);
            Book::create([
                'subcategory_id' => $novela->id,
                'code' => 'N002',
                'quantity' => 3,
                'title' => 'Don Quijote de la Mancha',
                'author' => 'Miguel de Cervantes',
                'editorial' => 'Francisco de Robles',
                'year' => 1605,
            ]);
        }

        if ($fisica) {
            Book::create([
                'subcategory_id' => $fisica->id,
                'code' => 'C001',
                'quantity' => 2,
                'title' => 'Una Breve Historia del Tiempo',
                'author' => 'Stephen Hawking',
                'editorial' => 'Bantam',
                'year' => 1988,
            ]);
        }

        if ($cuentos) {
            Book::create([
                'subcategory_id' => $cuentos->id,
                'code' => 'CU001',
                'quantity' => 7,
                'title' => 'El Aleph',
                'author' => 'Jorge Luis Borges',
                'editorial' => 'Losada',
                'year' => 1949,
            ]);
        }
    }
}