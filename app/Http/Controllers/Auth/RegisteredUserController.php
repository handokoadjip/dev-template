<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'pengguna_nama' => ['required', 'string', 'max:255'],
            'pengguna_email' => ['required', 'string', 'email', 'max:255', 'unique:pengguna'],
            'pengguna_password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'pengguna_nama' => $request->pengguna_nama,
            'pengguna_email' => $request->pengguna_email,
            'pengguna_password' => Hash::make($request->pengguna_password),
        ]);

        event(new Registered($user));

        // Auth::login($user);
        // return redirect(RouteServiceProvider::HOME);

        return redirect()->route('login')->with('success', 'Berhasil mendaftar, silakan login');
    }
}
