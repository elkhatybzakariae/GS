<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

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
            'email' => 'required|email|max:50',
            'password' => 'required|string|min:8',
        ]);

        $fullname = explode(' ', $validation['fullName']);

        $role = Role::where('role_name', 'owner')->first();
        $newuser = User::create([
            'id_U' => $id_U,
            'firstName' => $fullname[0],
            'lastName' => $fullname[1],
            'email' => $validation['email'],
            'password' => Hash::make($validation['password']),
            'id_R' => $role->id_R,
        ]);
        // $token = JWTAuth::fromUser($newuser);compact('token')

        return response()->json();
        // auth()->login($newuser);
        // $token = $request->user()->createToken('_token')->plainTextToken;

        // return response()->json(['user' => $newuser, 'token' => $token]);

        // return response()->json($newuser);
    }
    public function loginpage()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $v = $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|string|min:8',
        ]);
        $user = User::where('email', $request->email)->first();

        // return response()->json($v);
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                // if ($user->role && $user->role->role_name === 'owner') {

                $token = JWTAuth::fromUser($user);

                // return response()->json(compact('token'));
                // $token = $request->user()->createToken('token-name')->plainTextToken;

                return response()->json(['user' => $user, 'token' => $token]);
                // return response()->json(['msg' => 'hi :)']);
                // } else {

                //     $token = $request->user()->createToken('token-name')->plainTextToken;

                //     return response()->json(['user' => $user, 'token' => $token]);
                //     // Auth::login($user);
                //     // return response()->json(['msg' => ':)']);
                // }
            } else {

                return response()->json(['msg' => 'mot de passe incorect :(']);
            }
            // return redirect()->route('loginpage');
        } else {
            // return back()->with('error', 'Invalid email or password.');            
            return response()->json(['msg' => 'not found :(']);
        }
        // $credentials = $request->only(['email', 'password']);

        // if (Auth::attempt($credentials)) {
        //     $token = $request->user()->createToken('token-name')->plainTextToken;

        //     return response()->json(['token' => $token]);
        // }

        // return response()->json(['error' => 'Unauthorized'], 401);
    }
    public function logout()
    {
        // Auth::logout();
        // // return redirect()->route('loginpage');

        // return response()->json(['msg' => 'logout']);
        $token = JWTAuth::parseToken()->refresh();

        return response()->json(compact('token'));
    }
}
