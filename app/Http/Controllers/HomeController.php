<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //
    }

    public function feedbackStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string|max:500',
        ]);

        $feedback = new Feedback();
        $feedback->user_id = Auth::user() ? Auth::user()->id : null; // Use Auth facade to get the user ID if authenticated
        $feedback->name = $request->name;
        $feedback->message = $request->message;
        $feedback->save();

        return redirect()->back()->with('success', 'Feedback submitted successfully.');
    }


}
