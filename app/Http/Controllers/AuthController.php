<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller{

//Register
public function register(Request $request) 
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8', 
    ]);
    try {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan masuk.');
    } catch (\Exception $e) {
        return back()->with('error', 'Terjadi kesalahan sistem, silakan coba lagi nanti.');
    }
}
//Login
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);
    $user = User::where('email', $request->email)->first();
    if (!$user || !Hash::check($request->password, $user->password))
    {
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
    auth()->login($user);
    return redirect()->route('form_laporan');
}}