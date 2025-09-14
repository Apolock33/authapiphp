<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::factory()->create([
            'nome' => 'Test User',
            'email' => 'teste@teste.com',
            'nivel' => 'admin',
        ]);
    }
}