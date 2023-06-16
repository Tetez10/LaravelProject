<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin1',
            'email' => 'admin1@example.com',
            'password' => Hash::make('PasswordAdmin?'),
            'role' => 0, // Rôle admin (0)
        ]);
    
        // Création de l'utilisateur
        User::create([
            'name' => 'User1',
            'email' => 'user1@example.com',
            'password' => Hash::make('PasswordUser?'),
            'role' => 1, // Rôle utilisateur (1)
        ]);
}

}