<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UsersController extends Controller
{
    // Show the registration form
    public function register(Request $request)
    {
        return view('auth.register');
    }

    public function doRegister(Request $request)
    {
        // Check if passwords match
        if ($request->password != $request->password_confirmation) {
            return redirect()->route('register')->with('error', 'Confirm password does not match.');
        }
    
        // Manual validation for required fields
        if (!$request->email || !$request->name || !$request->password) {
            return redirect()->route('register')->with('error', 'Missing registration info.');
        }
    
        // Check if email already exists
        if (User::where('email', $request->email)->exists()) {
            return redirect()->route('register')->with('error', 'Email is already taken.');
        }
    
        // Validate user data using Validator
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:5'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 
                Password::min(8)->numbers()->letters()->mixedCase()->symbols()],
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('register')->withErrors($validator)->withInput();
        }
    
        // Create user with default role
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer', // Assign default role
        ]);
    
        Auth::login($user); // Auto-login the user
    
        return redirect('/')->with('success', 'Registration successful!');
    }
    


    // Show the login form
    public function login(Request $request)
    {
        return view('auth.login');
    }

   // Handle the login logic
public function doLogin(Request $request)
{
    // Validate the incoming login data
    $credentials = $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    // Attempt to log in the user
    if (Auth::attempt($credentials)) {
        // Redirect to home page after successful login
        return redirect('/');
    }

    // If login fails, redirect back with an error message
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}



    // Handle the logout logic
    public function doLogout(Request $request)
    {
        // Log out the user
        Auth::logout();

        // Redirect to the login page after logging out
        return redirect('/login');
    }
}
