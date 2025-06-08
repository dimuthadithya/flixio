<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show(Movie $movie)
    {
        return view('payment.show', [
            'movie' => $movie
        ]);
    }

    public function process(Movie $movie)
    {
        // This is just a mock payment processor
        // In a real app, you would process the payment here

        return redirect()->route('movie.play', $movie->id)
            ->with('success', 'Payment successful! Enjoy your movie.');
    }
}
