<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('userType','!=','guest')->orderBy('name', 'ASC')->paginate(15);
        return view('admin.page.Teams.team_member', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.Teams.create_member');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $image = $request->file('image')->getClientOriginalName();
        $imageName = time() . '_' . $image;

        // dd($imageName);
        $path = $request->image->storeAs('User_images', $imageName, 'public');
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'userType' => $request->userType,
            'path' => $path,
            'password' => Hash::make($request->password),
        ]);
        // dd($user);
        return redirect()->route('users.index')->with('success', 'New User created successfully.')->with('image', $path);
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
    public function edit(User $user)
    {
        return view('admin.page.Teams.edit_member', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255',
            'userType' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            if ($user->path) {
                Storage::disk('public')->delete($user->path);
            }
            $image = $request->file('image')->getClientOriginalName();
            $imageName = time() . '_' . $image;

            // dd($imageName);
            $path = $request->image->storeAs('User_images', $imageName, 'public');
            $user->path = $path;
            $user->update($request->only('name', 'email', 'userType', 'path'));
        } else {
            $user->update($request->only('name', 'email', 'userType'));
        }
        $user->save();
        // dd($user);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
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
        $user = User::find($id);
        // dd($user -> status);
        if ($user && $user->status == true) {
            $user->update(['status' => false]);
            // dd($user->status);
            return redirect()->route('users.index')->with('success', 'User disabled successfully.');
        } else if ($user && $user->status == false) {
            $user->update(['status' => true]);
            return redirect()->route('users.index')->with('success', 'User enabled successfully.');
        }
        return response("User may not exist.");
    }
}
