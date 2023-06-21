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
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'role' => 1, // Rôle admin (1)
        ]);
    
        // Création de l'utilisateur
        User::create([
            'name' => 'User1',
            'email' => 'user1@example.com',
            'password' => Hash::make('PasswordUser?'),
            'role' => 0, // Rôle utilisateur (0)
        ]);
}

}