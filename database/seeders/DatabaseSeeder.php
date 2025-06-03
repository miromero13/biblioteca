<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear un usuario de prueba
        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),  // Cambiar la contraseña si es necesario
        ]);

        // Crear categorías (ARTES PLÁSTICAS y MÚSICA)
        $categoryArts = Category::create([
            'name' => 'ARTES PLÁSTICAS',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDPRImhHyf7HdwVhUzV4wUWJrk-PXfy2Y0Xg&s', // Puedes poner aquí una URL de imagen
        ]);

        $categoryMusic = Category::create([
            'name' => 'MÚSICA',
            'image' => 'https://i0.wp.com/aion.mx/wp-content/uploads/2024/07/musica-e-IA-inteligencia-artificial.png?resize=960%2C640&ssl=1', // También puedes cambiarla
        ]);

        // Insertar libros en la categoría ARTES PLÁSTICAS
        $booksArt = [
            ['code' => 'AP-001', 'quantity' => 42, 'title' => 'Observo y Dibujo 6 EGB.', 'author' => 'Miguel Angel Baron Ferrero.', 'editorial' => 'Luis Vives-Zaragoza.', 'year' => 1984],
            ['code' => 'AP-002', 'quantity' => 40, 'title' => 'Observo y Dibujo 7 EGB.', 'author' => 'Miguel Angel Baron Ferrero.', 'editorial' => 'Luis Vives-Zaragoza.', 'year' => 1984],
            ['code' => 'AP-003', 'quantity' => 41, 'title' => 'Observo y Dibujo 8 EGB.', 'author' => 'Miguel Angel Baron Ferrero.', 'editorial' => 'Luis Vives-Zaragoza.', 'year' => 1984],
            ['code' => 'AP-004', 'quantity' => 3, 'title' => 'Plástica 6', 'author' => 'Barnechla-Reque', 'editorial' => 'Edelvives', 'year' => 1984],
            ['code' => 'AP-005', 'quantity' => 35, 'title' => 'Plástica 8', 'author' => 'Barnechla-Reque', 'editorial' => '', 'year' => null],
            ['code' => 'AP-006', 'quantity' => 6, 'title' => 'Formación estética dibujo 1º BUP', 'author' => 'Barnechla-Reque', 'editorial' => 'Edelvives', 'year' => 1989],
            // Aquí agregar los demás libros de ARTES PLÁSTICAS
        ];

        foreach ($booksArt as $book) {
            $categoryArts->books()->create($book);
        }

        // Insertar libros en la categoría MÚSICA
        $booksMusic = [
            ['code' => 'MU-001', 'quantity' => 2, 'title' => 'Cancionero sombrero e Saó.', 'author' => 'César Seotta.', 'editorial' => 'Casa del la Cultura', 'year' => 1992],
            ['code' => 'MU-002', 'quantity' => 1, 'title' => 'El libro de oro (Música Cruceña).', 'author' => 'Armando Terceros-Alex Parada.', 'editorial' => 'A.P.', 'year' => 1989],
            ['code' => 'MU-003', 'quantity' => 1, 'title' => 'Canciones y danzas del mundo (Fotocopias)', 'author' => 'Prof. Angel Zamora U.', 'editorial' => null, 'year' => null],
            ['code' => 'MU-004', 'quantity' => 1, 'title' => 'VIII Festival Interamericano de música Renacentista y Barroca.', 'author' => 'Asociación Pro Arte Cultura.', 'editorial' => null, 'year' => 2008],
            ['code' => 'MU-005', 'quantity' => 4, 'title' => 'VII Festival Interamericano de música Renacentista y Barroca', 'author' => 'Asociación Pro Arte Cultura.', 'editorial' => null, 'year' => 2008],
            // Aquí agregar los demás libros de MÚSICA
        ];

        foreach ($booksMusic as $book) {
            $categoryMusic->books()->create($book);
        }
    }
}
