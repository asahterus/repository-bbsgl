<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DocumentType::create(['name' => 'Jurnal Terbitan Berskala']);
        DocumentType::create(['name' => 'Bulletin']);
        DocumentType::create(['name' => 'Proceedings']);
        DocumentType::create(['name' => 'Laporan Hasil Survei']);
        DocumentType::create(['name' => 'Laporan Hasil Pemetaan']);
        DocumentType::create(['name' => 'Article']);
        DocumentType::create(['name' => 'Book']);
        DocumentType::create(['name' => 'Image']);
        DocumentType::create(['name' => 'Video']);
        DocumentType::create(['name' => 'Audio']);
        DocumentType::create(['name' => 'Dataset']);
        DocumentType::create(['name' => 'Other']);
    }
}
