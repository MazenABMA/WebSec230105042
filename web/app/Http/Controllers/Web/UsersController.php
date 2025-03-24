<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // List Users with Filters
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('keywords')) {
            $query->where('name', 'like', "%{$request->keywords}%")
                  ->orWhere('email', 'like', "%{$request->keywords}%");
        }

        $users = $query->paginate(10);
        return view('users.index', compact('users'));
    }

    // Show Create Form
    public function create()
    {
        return view('users.create');
    }

    // Store New User
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);
        return redirect()->route('users_list')->with('success', 'User created successfully!');
    }

    // Show Edit Form
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Update User
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$user->id}",
            'password' => 'nullable|string|min:6',
        ]);

        if ($request->password) {
            $validated['password'] = bcrypt($request->password);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);
        return redirect()->route('users_list')->with('success', 'User updated successfully!');
    }

    // Delete User
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users_list')->with('success', 'User deleted successfully!');
    }
}
