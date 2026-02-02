<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function redirectToProvider($provider)
    {
        if ($provider === 'google') {
            return Socialite::driver('google')->with(['prompt' => 'select_account'])->redirect();
        }

        if ($provider === 'github') {
            return Socialite::driver('github')->with(['allow_signup' => 'true', 'force_verify' => 'true'])->redirect();
        }

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['email' => 'Social login failed.']);
        }

        $user = User::where('email', $socialUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                $provider . '_id' => $socialUser->getId(),
                'password' => null,
                'email_verified_at' => now(),
            ]);

            session(['pending_user_id' => $user->id]);
            return redirect()->route('auth.set-password');
        }

        if (is_null($user->email_verified_at)) {
            $user->update([
                'email_verified_at' => now(),
            ]);
        }

        if (is_null($user->{$provider . '_id'})) {
            $user->update([
                $provider . '_id' => $socialUser->getId()
            ]);
        }

        if (is_null($user->password)) {
            session(['pending_user_id' => $user->id]);
            return redirect()->route('auth.set-password');
        }

        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function showSetPassword()
    {
        if (!session()->has('pending_user_id')) {
            return redirect()->route('login');
        }
        return view('auth.set-password');
    }

    public function storeSetPassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $userId = session('pending_user_id');
        $user = User::findOrFail($userId);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        session()->forget('pending_user_id');

        return redirect()->route('dashboard')->with('status', 'Password set successfully! Welcome.');
    }
}
