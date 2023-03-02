<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    function Registration(Request $request) {
        $validatedData = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users'],
            'password' => ['required'],
        ]);

        $user = User::create([
            'name'      =>$request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password)
        ]);

        return $user;
    }

    function Login(Request $request) {
        $validatedData = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt( $validatedData)) {
            $user = User::where(["email" => $request->email])->get();

            $token = $request->user()->createToken("valami");

            return [
                'user' => $user,
                'token' => $token->plainTextToken
            ];

        }

        return response("Hibás felhasználónév vagy jelszó!", 500);
    }

    function VedettAdatok() {
        return "Szigorúan titkos";
    }
}
