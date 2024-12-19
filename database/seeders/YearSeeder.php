<?php

namespace Database\Seeders;


use App\Models\Year;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Year::create([
            'year' => '2017-2018',
        ]);
        Year::create([
            'year' => '2018-2019',
        ]);
        Year::create([
            'year' => '2019-2020',
        ]);
        Year::create([
            'year' => '2020-2021',
        ]);
        Year::create([
            'year' => '2021-2022',
        ]);
        Year::create([
            'year' => '2022-2023',
        ]);
        Year::create([
            'year' => '2023-2024',
        ]);
        Year::create([
            'year' => '2024-2025',
        ]);
    }
}
