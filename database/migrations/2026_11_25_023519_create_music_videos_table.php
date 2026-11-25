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
        Schema::create('music_videos', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->foreignId('album_id')->nullable()->constrained('albums')->nullOnDelete();
            $table->date('release_date')->nullable();
            $table->string('youtube_id');
            $table->string('thumbnail_url')->nullable();
            $table->string('category')->default('Official MV');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music_videos');
    }
};
