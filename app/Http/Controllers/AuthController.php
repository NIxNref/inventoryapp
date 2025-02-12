<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Handle the login request.
     */
    public function login(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt to log in the user
        if (Auth::attempt($credentials)) {

            Log::info('Login berhasil', ['email' => $credentials['email']]);

            $request->session()->regenerate(); // Regenerate session to prevent fixation attacks

            $user = Auth::user(); // Retrieve the authenticated user

            // Check if the user exists
            if (!$user) {
                Auth::logout();
                Log::warning('Login attempt failed. User not found.', ['email' => $credentials['email']]);
                return redirect()->back()->withErrors(['email' => 'User does not exist.'])->withInput();
            }

            // Log the user information
            Log::info('User logged in successfully.', [
                'id' => $user->id,
                'email' => $user->email,
                'role' => $user->role,
            ]);

            // Redirect based on user role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Welcome to the Admin Dashboard!');
            } elseif ($user->role === 'user') {
                return redirect()->route('user.dashboard')->with('success', 'Welcome to the User Dashboard!');
            }

            // If no role is matched, log out the user
            Auth::logout();
            Log::warning('Login attempt failed. User role is invalid.', ['id' => $user->id]);
            return redirect()->back()->withErrors(['email' => 'Invalid user role.'])->withInput();
        }

        // Login failed (email or password is incorrect)
        Log::error('Login attempt failed. Invalid credentials.', ['email' => $credentials['email']]);
        return redirect()->back()->withErrors(['email' => 'Invalid login credentials.'])->withInput();
    }

    /**
     * Log out the user.
     */
    public function logout(Request $request)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Log logout action
            Log::info('User logged out.', [
                'id' => $user->id,
                'email' => $user->email,
            ]);
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'You have logged out.');
    }
}
