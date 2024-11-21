<?php

namespace Database\Seeders;

use App\Models\Eprint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EprintsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Eprint::create([
            'title' => 'ANALISIS SIMBOL DALAM KUMPULAN PUISI “SAJAK MALAM STANZA” KARYA W.S RENDRA DENGAN PENDEKATAN SEMIOTIKA CHARLES SANDERS PEIRCE',
            'abstract' => 'This is the abstract for the first eprint.',
            'keywords' => 'keyword1, keyword2, keyword3',
            'user_id' => 2,
            'publication_date' => '2024-09-28',
            'status' => 'submitted',
            'jenis' => 'Undergraduate Thesis',
            'author' => 'Yunita, Devi Arie',
            'institusi' => 'Universitas Muhammadiyah Malang',
            'department' => 'Survei dan Pemetaan Mitigasi Kebencanaan Kekayaan Kelautan',
            'metadata' => 'Yunita, Devi Arie (2018) ANALISIS SIMBOL DALAM KUMPULAN PUISI “SAJAK MALAM STANZA” KARYA W.S RENDRA DENGAN PENDEKATAN SEMIOTIKA CHARLES SANDERS PEIRCE. Undergraduate thesis, Universitas Muhammadiyah Malang.'
        ]);

        Eprint::create([
            'title' => 'EXPLORING THE USE OF TIKTOK AS SELF-REGULATED LEARNING MEDIUM FOR SPEAKING SKILL IN VOCATIONAL HIGH SCHOOL',
            'abstract' => 'This is the abstract for the second eprint.',
            'keywords' => 'keywordA, keywordB, keywordC',
            'user_id' => 2,
            'jenis' => 'Masters Thesis',
            'author' => 'Qomariyah, Silviana',
            'institusi' => 'Universitas Muhammadiyah Malang',
            'publication_date' => '2024-09-27',
            'status' => 'published',
            'department' => 'Survei dan Pemetaan Mitigasi Kebencanaan Kewilayahan Kelautan',
            'metadata' => 'Qomariyah, Silviana (2024) EXPLORING THE USE OF TIKTOK AS SELF-REGULATED LEARNING MEDIUM FOR SPEAKING SKILL IN VOCATIONAL HIGH SCHOOL. Masters thesis, Universitas Muhammadiyah Malang.'
        ]);
    }
}
