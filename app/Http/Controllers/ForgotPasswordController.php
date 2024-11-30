<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Adjust to match your User model namespace
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password'); // Create this view
    }

    public function handleForgotPassword(Request $request)
    {
        // Validate that the username is provided
        $request->validate(['username' => 'required|string']);

        // Check if the username exists in the database
        $user = User::where('username', $request->username)->first();

        if (!$user) {
            // Return back with an error message if username is not found
            return back()->withErrors(['username' => 'The username does not exist in our records.']);
        }

        // Redirect to the reset password form with the username as a parameter
        return redirect()->route('reset-password.form', ['username' => $user->username])
                        ->with('status', 'Username verified! Proceed to reset your password.');
    }


    public function showResetPasswordForm($username)
    {
        return view('auth.reset-password', ['username' => $username]); // Create this view
    }

    public function handleResetPassword(Request $request, $username)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user = User::where('username', $username)->first();

        if (!$user) {
            return redirect()->route('forgot.password.form')->withErrors(['username' => 'Invalid username.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Password reset successfully.');
    }
}
