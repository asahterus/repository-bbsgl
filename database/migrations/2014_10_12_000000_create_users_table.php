<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('given_name');
            $table->string('family_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'author', 'reviewer', 'user'])->default('user');
            $table->string('address')->nullable();
            $table->string('department')->nullable();
            $table->string('country')->nullable();
            $table->string('homepage_url')->nullable();
            $table->string('organization')->nullable();
            $table->enum('hide_email', [
                'Make email visible to all',
                'Hide email to all except repository administration',
                'UNSPECIFIED'
            ]);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
