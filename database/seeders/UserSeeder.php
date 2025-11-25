<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Agro',
            'email' => 'admin@agro.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'lokasi' => 'Jakarta',
            'komunitas_petani' => 'Agro Nasional',
        ]);
        
        User::create([
            'name' => 'Petani Satu',
            'email' => 'petani@agro.com',
            'password' => Hash::make('petani123'),
            'role' => 'user',
            'lokasi' => 'Sleman',
            'komunitas_petani' => 'Petani Maju',
        ]);

    }
}
