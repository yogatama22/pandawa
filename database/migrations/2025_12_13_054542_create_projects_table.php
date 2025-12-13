<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category'); // Interior, Exterior, Urban, Planning, dll
            $table->text('short_description')->nullable();
            $table->longText('description');
            $table->string('thumbnail'); // Gambar utama untuk list
            $table->string('client_name')->nullable();
            $table->string('location')->nullable();
            $table->year('year')->nullable();
            $table->string('project_type')->nullable(); // Residential, Commercial, dll
            $table->decimal('area', 10, 2)->nullable(); // Luas area dalam m2
            $table->integer('duration')->nullable(); // Durasi pengerjaan dalam hari
            $table->boolean('is_featured')->default(false); // Highlight untuk homepage
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        // Table untuk menyimpan multiple images per project
        Schema::create('project_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('image_path');
            $table->string('caption')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_images');
        Schema::dropIfExists('projects');
    }
};