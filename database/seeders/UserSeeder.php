<?php

namespace Database\Seeders;

use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert(array(
            [
                'nama_peternak' => 'Administrator Ayamcare',
                'no_handphone' => '08123000111',
                'alamat' => 'Jalan kesayangan',
                'password' => Hash::make('12345678'),
                'email' => 'admin@ayam.care',
                'username' => 'admin',
                'status_akun' => 'ADMIN'
            ],
            [
                'nama_peternak' => 'Pengguna 1 STANDARD Demo',
                'no_handphone' => '08123222111',
                'alamat' => 'Jalan Kesepian 77',
                'password' => Hash::make('12345678'),
                'email' => 'admin@ayam.care',
                'username' => 'pengguna1',
                'status_akun' => 'STANDARD'
            ],
            [
                'nama_peternak' => 'Pengguna 2 VIP Demo',
                'no_handphone' => '08123333111',
                'alamat' => 'Jalan Kesedihan 99',
                'password' => Hash::make('12345678'),
                'email' => 'admin@ayam.care',
                'username' => 'pengguna2',
                'status_akun' => 'VIP'
            ],
            ));

    }
}
