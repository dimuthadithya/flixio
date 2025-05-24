<?php

namespace App\View\Components;

use App\Services\TmdbService;
use Illuminate\View\Component;

class MovieCardAdmin extends Component
{
    public $movie;


    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    public function render()
    {
        return view('components.movie-card-admin');
    }
}
