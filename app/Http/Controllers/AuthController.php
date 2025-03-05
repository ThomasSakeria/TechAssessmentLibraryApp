<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use App\Models\Book;


class AuthController extends Controller
{
    public function create(){
        return inertia('Auth/Login');
    }


    public function store(Request $request)
    {
        
        if(!Auth::attempt($request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            ]), true)){
                throw ValidationException::withMessages([
                    'email' =>  'Authentication Failed!!! Please check your credentials..'
                ]);
        }

        $request ->session()->regenerate();
        $user = Auth::user();
        Auth::login($user);

        if ($user->is_admin == 1) {
            return redirect()->route('admin.index');
        } else {
            return redirect()->route('index');
        }

        //return redirect()->intended();

    }


    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
