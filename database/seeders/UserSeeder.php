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

        $operator =
            User::create([
                'name' => 'operator',
                'email' => 'operator@gmail.com',
                'password' => Hash::make('password1234'),
            ]);
        $operator->assignRole('operator');

        // $guru =
        //     User::create([
        //         'name' => 'guru',
        //         'email' => 'guru@gmail.com',
        //         'password' => Hash::make('password1234'),
        //     ]);
        // $guru->assignRole('guru');

        $siswa =
            User::create([
                'name' => 'siswa',
                'email' => 'siswa@gmail.com',
                'password' => Hash::make('password1234'),
            ]);
        $siswa->assignRole('siswa');
    }
}
