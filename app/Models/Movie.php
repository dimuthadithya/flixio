<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'tmdb_id',
        'title',
        'original_title',
        'release_date',
        'runtime',
        'overview',
        'poster_path',
        'backdrop_path',
        'vote_average',
        'vote_count',
        'popularity',
        'genres',
        'status',
        'tagline',
        'budget',
        'revenue',
        'imdb_id',
        'original_language',
        'video',
        'adult',
        'trailer'
    ];

    protected $casts = [
        'release_date' => 'date',
        'vote_average' => 'float',
        'vote_count' => 'integer',
        'popularity' => 'float',
        'runtime' => 'integer',
        'budget' => 'integer',
        'revenue' => 'integer',
        'video' => 'boolean',
        'adult' => 'boolean',
        'genres' => 'array'
    ];


    // Get formatted genres as string
    public function getGenresListAttribute()
    {
        return is_array($this->genres) ? implode(', ', array_column($this->genres, 'name')) : '';
    }

    // Get full poster URL
    public function getPosterUrlAttribute()
    {
        return $this->poster_path ? 'https://image.tmdb.org/t/p/original' . $this->poster_path : null;
    }

    // Get full backdrop URL
    public function getBackdropUrlAttribute()
    {
        return $this->backdrop_path ? 'https://image.tmdb.org/t/p/original' . $this->backdrop_path : null;
    }

    // Get year from release date
    public function getYearAttribute()
    {
        return $this->release_date ? $this->release_date->format('Y') : null;
    }

    // Format runtime to hours and minutes
    public function getFormattedRuntimeAttribute()
    {
        if (!$this->runtime) return null;
        $hours = floor($this->runtime / 60);
        $minutes = $this->runtime % 60;
        return $hours > 0 ? "{$hours}h {$minutes}m" : "{$minutes}m";
    }
}
