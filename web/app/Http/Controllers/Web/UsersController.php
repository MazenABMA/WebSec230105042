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

    // Handle the registration logic
    public function doRegister(Request $request)
    {
        // Validate manually for password match and missing fields
        if ($request->password != $request->password_confirmation) {
            return redirect()->route('register')->with('error', 'Confirm password does not match.');
        }

        if (!$request->email || !$request->name || !$request->password) {
            return redirect()->route('register')->with('error', 'Missing registration info.');
        }

        // Check if the email already exists in the database
        if (User::where('email', $request->email)->first()) {
            return redirect()->route('register')->with('error', 'Email is already taken.');
        }

        // Validate the form data using Laravel validation rules
        $this->validate($request, [
            'name' => ['required', 'string', 'min:5'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 
                Password::min(8)->numbers()->letters()->mixedCase()->symbols()],
        ]);

        // Create the new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password securely
        ]);

        // Log the user in after registration
        Auth::login($user);

        // Redirect to the home page after successful registration
        return redirect('/');
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
