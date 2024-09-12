<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreSignupController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index()
    {
        return view('auth.signup');
    }

    public function store(StoreSignupController $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $validated['avatar'] = $avatarPath;
        }

        $validated['password'] = Hash::make($validated['password']);
        unset($validated['confirm_password']);

        User::create($validated);

        return redirect()->route('auth.signin')->with('registrationSuccess', 'Pendaftaran Berhasil. Silahkan Masuk!');
    }
}
