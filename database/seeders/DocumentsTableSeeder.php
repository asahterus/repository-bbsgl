<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Document::create([
            'eprint_id' => 1,
            'document_type_id' => 1,
            'file_path' => 'documents/eprint1.pdf'
        ]);

        Document::create([
            'eprint_id' => 2,
            'document_type_id' => 2,
            'file_path' => 'documents/eprint2.pdf'
        ]);
    }
}
