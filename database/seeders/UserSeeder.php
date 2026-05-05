<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nik' => null,
            'name' => 'Administrator',
            'email' => 'admin@easpirasi.com',
            'phone' => '081111111111',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'nik' => null,
            'name' => 'Petugas Verifikasi',
            'email' => 'petugas@easpirasi.com',
            'phone' => '082222222222',
            'password' => Hash::make('password123'),
            'role' => 'petugas',
        ]);

        User::create([
            'nik' => '3201012345678901',
            'name' => 'Budi Masyarakat',
            'email' => 'budi@gmail.com',
            'phone' => '083333333333',
            'password' => Hash::make('password123'),
            'role' => 'masyarakat',
        ]);
    }
}
