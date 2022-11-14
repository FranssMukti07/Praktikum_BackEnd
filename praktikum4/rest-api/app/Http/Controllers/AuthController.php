<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        /**
         * Fitur register
         * Ambil input name, email, dan password
         * Input datanya ke database
         */
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $user = User::create($input);

        $data = [
            'message' => 'Register is successfully'
        ];

        return response($data, 200);
    }

    public function login(Request $request)
    {
        /**
         * Fitur Login
         * Ambil input email dan password
         * Ambil input email dan password dari db berdasarkan email
         * Bandingkan data input user dengan data dari db
         */

        $input = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // $user = User::where('email', $input['email'])->first(); => Manual way collecting data from database

        // $isLoginTrue = $input['email'] == $user->email && Hash::check($input['password'], $user->password) => Manual way for auth
        if (Auth::attempt($input)) { // Auth with build-in method from Laravel
            // $token = $user->createToken('auth_token');  => Manual way creating token for user
            $token = Auth::user()->createToken('auth_token');  // Creating token with build-in method from Laravel

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
