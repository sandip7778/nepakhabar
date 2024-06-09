<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests = User::where('userType','guest')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.page.others.guestUsers', compact('guests'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changeStatus(Request $request, $id)
    {
        $guest = User::find($id);
        // dd($guest -> status);
        if ($guest && $guest->status == true) {
            $guest->update(['status' => false]);
            // dd($guest->status);
            return redirect()->route('guests.index')->with('success', 'User disabled successfully.');
        } else if ($guest && $guest->status == false) {
            $guest->update(['status' => true]);
            return redirect()->route('guests.index')->with('success', 'User enabled successfully.');
        }
        return response("User may not exist.");
    }
}
