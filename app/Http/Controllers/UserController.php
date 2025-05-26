<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Watchlist;

class UserController extends Controller
{

    public function index(){
         $watchlists = Watchlist::where('user_id', Auth::user()->id)
            ->join('movies', 'watchlists.movie_id', '=', 'movies.id')
            ->select('movies.*')
            ->get()
            ->toArray();

            return view("user.dashboard", compact('watchlists'));


    }


public function updatePassword(Request $request)
{
    // Validate the request
    $request->validate([
        'current_password' => 'required',
        'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required',
    ], [
        'password.regex' => 'Password must contain at least one letter, one number, and one special character.',
    ]);

    $user = User::find(Auth::id());

    // Check if current password is correct
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Current password is incorrect.']);
    }

    // Update the password
    $user->password = Hash::make($request->password);
    $user->save();

    return back()->with('success', 'Password updated successfully!');
}


}
