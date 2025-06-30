<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required|regex:/^01[3-9]\d{8}$/|unique:users',
            'password' => [
                'required',
                'min:8', 
                'regex:/[@$!%*?&#]/',
                
            ]
        ]);

        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registered successfully!');
    }


    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required|regex:/^01[3-9]\d{8}$/',
            'password' => 'required'
        ]);

        $user = User::where('phone', $request->phone)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('welcome');
        }

        return back()->withErrors(['Invalid phone or password']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
