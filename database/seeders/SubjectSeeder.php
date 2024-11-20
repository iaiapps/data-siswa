<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::create([
            'pelajaran' => 'PAI',
        ]);
        Subject::create([
            'pelajaran' => 'Matematika',
        ]);
        Subject::create([
            'pelajaran' => 'Bahasa Indonesia',
        ]);
        Subject::create([
            'pelajaran' => 'Pendidikan Pancasila',
        ]);
        Subject::create([
            'pelajaran' => 'IPAS',
        ]);
        Subject::create([
            'pelajaran' => 'SDB',
        ]);
        Subject::create([
            'pelajaran' => 'Tahfidz',
        ]);
        Subject::create([
            'pelajaran' => 'Bahasa Daerah',
        ]);
        Subject::create([
            'pelajaran' => 'Bahasa Inggris',
        ]);
        Subject::create([
            'pelajaran' => 'PJOK',
        ]);
        Subject::create([
            'pelajaran' => 'SKI',
        ]);
    }
}
