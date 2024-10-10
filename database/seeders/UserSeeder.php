<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Nome de Teste',
            'email' => 'teste@example.com',
            'password' => Hash::make('senha123'), // Altere para a senha desejada
        ]);
    }
}
