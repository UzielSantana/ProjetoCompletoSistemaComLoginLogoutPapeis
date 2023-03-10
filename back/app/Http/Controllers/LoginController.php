<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller

{

    public function login(Request $request) {
        if(Auth::attempt(['email' => $request-> email, 'password'  => $request -> password])) {
            $user = Auth::user();
            $token = $user ->createToken('LogaToken');

            return response()->json(['success' => true, 'token' => $token->plainTextToken, 'papel' => $user->papel ], 200);
        }
        return response()->json(['success' => false, 'error' => 'usuario Nao Valido'], 401);
    }
}
