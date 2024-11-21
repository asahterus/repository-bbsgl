<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Subject::create(['name' => 'BLU']);
        Subject::create(['name' => 'Mitigasi']);
        Subject::create(['name' => 'Mineral']);
    }
}
