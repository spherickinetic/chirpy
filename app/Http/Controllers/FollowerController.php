<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follower;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class FollowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        return view('followers.index', [
            'followers' => $request->user()->followers,
            'following' => $request->user()->following
        ]);
    }

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
    public function store(Request $request): RedirectResponse
    {
        $user_to_follow = User::findOrFail($request->follower_id); // Check the user exists

        $sync = $request->user()->following()->syncWithoutDetaching($user_to_follow);

        // TODO if the user has sync return a message to be flashed back to the user

        return redirect()->back(); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Follower $follower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Follower $follower)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Follower $follower)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Follower $follower)
    {
        $user_to_follow = User::findOrFail($request->follower_id); // Check the user exists

        $sync = $request->user()->following()->detach($user_to_follow);

        // TODO if the user has sync return a message to be flashed back to the user

        return redirect()->back(); 

    }
}
