<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::create([
            'kelas' => 'Kelas 1 Abu Bakar',
        ]);
        Group::create([
            'kelas' => 'Kelas 1 Umar bin Khatab',
        ]);
        Group::create([
            'kelas' => 'Kelas 1 Utsman bin Affan',
        ]);
        Group::create([
            'kelas' => 'Kelas 1 Ali bin Abi Thalib',
        ]);

        // kelas 2
        Group::create([
            'kelas' => 'Kelas 2 Abu Bakar',
        ]);
        Group::create([
            'kelas' => 'Kelas 2 Umar bin Khatab',
        ]);
        Group::create([
            'kelas' => 'Kelas 2 Utsman bin Affan',
        ]);
        Group::create([
            'kelas' => 'Kelas 2 Ali bin Abi Thalib',
        ]);

        // kelas 3
        Group::create([
            'kelas' => 'Kelas 3 Abu Bakar',
        ]);
        Group::create([
            'kelas' => 'Kelas 3 Umar bin Khatab',
        ]);
        Group::create([
            'kelas' => 'Kelas 3 Utsman bin Affan',
        ]);
        Group::create([
            'kelas' => 'Kelas 3 Ali bin Abi Thalib',
        ]);

        // kelas 4
        Group::create([
            'kelas' => 'Kelas 4 Abu Bakar',
        ]);
        Group::create([
            'kelas' => 'Kelas 4 Umar bin Khatab',
        ]);
        Group::create([
            'kelas' => 'Kelas 4 Utsman bin Affan',
        ]);
        Group::create([
            'kelas' => 'Kelas 4 Ali bin Abi Thalib',
        ]);

        // kelas 5
        Group::create([
            'kelas' => 'Kelas 5 Abu Bakar',
        ]);
        Group::create([
            'kelas' => 'Kelas 5 Umar bin Khatab',
        ]);
        Group::create([
            'kelas' => 'Kelas 5 Utsman bin Affan',
        ]);
        Group::create([
            'kelas' => 'Kelas 5 Ali bin Abi Thalib',
        ]);

        // kelas 6
        Group::create([
            'kelas' => 'Kelas 6 Abu Bakar',
        ]);
        Group::create([
            'kelas' => 'Kelas 6 Umar bin Khatab',
        ]);
        Group::create([
            'kelas' => 'Kelas 6 Utsman bin Affan',
        ]);
        Group::create([
            'kelas' => 'Kelas 6 Ali bin Abi Thalib',
        ]);
    }
}
