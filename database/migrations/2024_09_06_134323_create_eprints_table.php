<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// return new class extends Migration {
//     /**
//      * Run the migrations.
//      */
//     public function up(): void
//     {
//         Schema::create('eprints', function (Blueprint $table) {
//             $table->id();
//             $table->string('title');
//             $table->text('abstract')->nullable();
//             $table->string('keywords')->nullable();
//             $table->string('jenis');
//             $table->string('author');
//             $table->string('institusi');
//             $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
//             $table->date('publication_date')->nullable();
//             $table->enum('status', ['published', 'in_press', 'submitted', 'unpublished'])->default('submitted');
//             $table->text('metadata');
//             $table->enum('department', ['Survei dan Pemetaan Sumber Daya Geologi Kelautan', 'Survei dan Pemetaan Mitigasi Kebencanaan Kekayaan Alam Kelautan', 'other']);
//             $table->timestamps();
//         });
//     }

//     /**
//      * Reverse the migrations.
//      */
//     public function down(): void
//     {
//         Schema::dropIfExists('eprints');
//     }
// };

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eprints', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('abstract')->nullable();
            $table->string('keywords')->nullable();
            $table->string('journal_title')->nullable();
            $table->string('issn')->nullable();
            $table->string('publisher')->nullable();
            $table->string('official_url')->nullable();
            $table->string('volume')->nullable();
            $table->string('number')->nullable();
            $table->integer('page_from')->nullable();
            $table->integer('page_to')->nullable();
            $table->integer('year')->nullable();
            $table->string('month')->nullable();
            $table->integer('day')->nullable();
            $table->string('date_type')->nullable();
            $table->string('identification_number')->nullable();
            $table->text('references')->nullable();
            $table->text('additional_information')->nullable();
            $table->text('comments')->nullable();
            $table->enum('item_type', ['Article', 'Book Section', 'Other'])->default('Other'); // From upload_data
            $table->string('file')->nullable(); // From upload_data
            $table->string('url')->nullable();  // From upload_data
            $table->string('contact_email')->nullable();
            $table->json('family_names')->nullable(); // Storing arrays as JSON
            $table->json('given_names')->nullable();  // Storing arrays as JSON
            $table->json('nims')->nullable();         // Storing arrays as JSON
            $table->json('emails')->nullable();       // Storing arrays as JSON
            $table->json('corporate_creators')->nullable();
            $table->json('contribution')->nullable();
            $table->json('divisions')->nullable();
            $table->enum('refereed', ['yes', 'no'])->nullable();
            $table->enum('status', ['published', 'in_press', 'submitted', 'unpublished'])->default('submitted');
            $table->json('related_urls')->nullable();
            $table->json('url_type')->nullable();
            $table->json('funders')->nullable();
            $table->json('projects')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('subject_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eprints');
    }
};
