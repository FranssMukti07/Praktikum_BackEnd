<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Method for Register New User
    public function register(Request $request)
    {
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $user = User::create($input);

        $data = [
            'Message' => 'Register is successfully',
            'Result' => 'Hi, ' . $user['name'] . '.Try to login now!'
        ];

        return response($data, 200);
    }

    // Method for Login with Existing User
    public function login(Request $request)
    {
        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if (Auth::attempt($input)) {
            $token = Auth::user()->createToken('auth_token'); // Build-in creating token method for accessing API

            $data = [
                'message' => "Login Succesfully!! Copy your token down below.",
                'token' => $token->plainTextToken
            ];

            return response($data, 200);
        } else {
            $data = [
                'message' => "Login Failed!! Try to login again!"
            ];

            return response($data, 401);
        }
    }
}
