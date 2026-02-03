<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function verifyNotice()
    {
        return view('auth.verify-email');
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('dashboard')->with('status', 'Email verified successfully!');
    }

    public function resendVerification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'Verification link sent!');
    }

    public function edit()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'current_password' => ['nullable', 'current_password'],
            'password' => ['nullable', 'confirmed', Password::defaults()],
        ]);

        $request->user()->fill([
            'name' => $validated['name'],
        ]);

        if ($request->filled('password')) {
            $request->user()->update([
                'password' => Hash::make($validated['password']),
            ]);
        }

        $request->user()->save();

        return back()->with('status', 'Profile updated successfully.');
    }

    public function destroy(Request $request)
    {
        $user = $request->user();

        if ($user->password) {
            $request->validate([
                'password' => ['required', 'current_password'],
            ]);
        }

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
