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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->integer('tmdb_id')->unique();
            $table->string('title');
            $table->string('original_title');
            $table->date('release_date');
            $table->integer('runtime')->nullable();
            $table->text('overview');
            $table->string('poster_path')->nullable();
            $table->string('backdrop_path')->nullable();
            $table->float('vote_average')->nullable();
            $table->integer('vote_count')->nullable();
            $table->float('popularity')->nullable();
            $table->json('genres')->nullable();
            $table->enum('status', ['active', 'inactive', 'pending'])->default('pending');
            $table->string('tagline')->nullable();
            $table->bigInteger('budget')->nullable();
            $table->bigInteger('revenue')->nullable();
            $table->string('imdb_id')->nullable();
            $table->string('original_language', 5);
            $table->string('trailer');
            $table->boolean('adult')->default(false);
            $table->string('movie_file')->nullable();
            $table->string('download_link')->nullable();
            $table->integer('file_size')->nullable();
            $table->timestamps();

            // Indexes for better performance
            $table->index('tmdb_id');
            $table->index('title');
            $table->index('status');
            $table->index('release_date');
            $table->index('vote_average');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
