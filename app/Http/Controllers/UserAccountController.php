<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;




class UserAccountController extends Controller 
{

    public function create()
    {
        return inertia(('Auth/Register'));
    }

    public function store(Request $request)
    {
        $user = User::make($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required','min:8', 'confirmed'],
            'is_admin' => ['boolean'],     
        ]));

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'is_admin' => $request['is_admin'], 
        ]);

        Auth::login($user);
        if($user->is_admin){
        return redirect()->route('admin.index')->with('success','Account Created!');
        }
        return redirect()->route('home')->with('success','Account Created!');
    }

    
}
