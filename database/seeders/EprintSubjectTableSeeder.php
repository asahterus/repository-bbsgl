<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EprintSubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('eprint_subject')->insert([
            ['eprint_id' => 1, 'subject_id' => 1], // Eprint 1 belongs to Computer Science
            ['eprint_id' => 1, 'subject_id' => 2], // Eprint 1 also belongs to Mathematics
            ['eprint_id' => 2, 'subject_id' => 3], // Eprint 2 belongs to Statistics
        ]);
    }
}
