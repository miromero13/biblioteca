<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Casa del Joven',
            'email' => 'bibliotecacasadeljoven@gmail.com',
            'password' => Hash::make('biblioteca'),
        ]);

        User::create([
            'name' => 'Anakiara Guzmán',
            'email' => 'anakiaraguzmanpolanco969@gmail.com',
            'password' => Hash::make('contraseña'),
        ]);
    }
}
