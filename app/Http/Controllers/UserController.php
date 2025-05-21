<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
   

public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => ['required'],
        'password' => ['required', 'string', 'confirmed'],
    ]);
    $user = Auth::user(); // This ensures you're updating the current logged-in user's password

    if (!Hash::check($request->current_password, $user->password)) {
        return back()->withErrors(['current_password' => 'Current password is incorrect.']);
    }

    // Ensure $user is an instance of the User model
    if ($user instanceof \App\Models\User) {
        $user->password = bcrypt($request->password);
        $user->save();
    } else {
        return back()->withErrors(['user' => 'Authenticated user is invalid.']);
    }
    $user->save();

    return back()->with('success', 'Password updated successfully.');
}


}
