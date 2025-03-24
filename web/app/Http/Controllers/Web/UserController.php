<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Apply search filter
        if ($request->has('keywords')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->keywords}%")
                  ->orWhere('email', 'like', "%{$request->keywords}%");
            });
        }

        // Apply role filter (if "Customers Only" is clicked)
        if ($request->has('filter') && $request->filter === 'customers') {
            $query->where('role', 'customer');
        }

        // Employees can see ALL users, including admins & customers
        $users = $query->paginate(10);

        return view('users.index', compact('users'));
    }

    public function profile(Request $request, User $user = null)
    {
        $user = $user ?? auth()->user();

        // Restrict access if viewing another user's profile
        if (auth()->id() !== $user->id) {
            if (!auth()->user()->hasPermissionTo('show_users')) {
                abort(403, 'Unauthorized action.');
            }
        }

        return view('users.profile', compact('user'));
    }

    // Show Create Form
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Restrict employee creation to admins only
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('users_list')->with('error', 'Only admins can add employees.');
        }
    
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role' => 'required|in:employee,customer,admin', // Allow all valid roles
        ]);
    
        // Encrypt password
        $validated['password'] = bcrypt($validated['password']);
    
        // Create the new user
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
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => $request->password ? 'string|min:6' : '',
            'role' => 'required|in:customer,employee,admin',
        ]);

        // Hash password only if provided
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
