<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registerpage()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }
    public function register(Request $request)
    {
        $id_U = Helpers::generateIdU();
        $validation = $request->validate([
            'fullName' => 'required|string|max:50',
            'Email' => 'required|email|max:50',
            'Password' => 'required|string|min:8',
        ]);

        $fullname = explode(' ', $validation['fullName']);
        
        $role = Role::where('role_name', '')->first();
        $newuser = User::create([
            'id_U' => $id_U,
            'FirstName' => $fullname[0],
            'LastName' => $fullname[1],
            'Email' => $validation['Email'],
            'Password' => Hash::make($validation['Password']),
            'id_R' => $role->id_R,
        ]);
        auth()->login($newuser);
        return redirect()->route('index');
    }
    public function loginpage()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $v = $request->validate([
            'Email' => 'required|email|max:50',
            'Password' => 'required|string|min:8',
        ]);
        $u = User::where('Email', $request->Email)->first();

        if ($u) {
            if (Hash::check($request->Password, $u->Password)) {
                if ($u->roles->contains('role_name', 'client')) {
                    Auth::login($u);
                    return redirect()->route('index');
                } else {
                    Auth::login($u);
                }
            }
            return redirect()->route('loginpage');
        } else {
            return back()->with('error', 'Invalid email or password.');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginpage');
    }
}
