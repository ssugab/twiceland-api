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
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')->constrained('albums')->cascadeOnDelete();
            $table->string('title');
            $table->string('duration', 8)->nullable();
            $table->smallInteger('track_number')->nullable();
            $table->boolean('is_title_track')->default(false);
            $table->json('composers')->nullable();
            $table->json('producers')->nullable();
            $table->timestamps();

            $table->index(['album_id', 'track_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracks');
    }
};
