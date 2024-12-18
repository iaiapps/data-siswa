<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin =
            User::create([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('passwordadmin123'),
            ]);
        $admin->assignRole('admin');

        $siswa =
            User::create([
                'name' => 'siswa',
                'email' => 'siswa@gmail.com',
                'password' => Hash::make('passwordharum'),
            ]);
        $siswa->assignRole('siswa');
    }
}
