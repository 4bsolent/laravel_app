<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\User;
use \stdClass;

class AuthController extends Controller
{
    //
    public function register(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'requiered|string|min:8'
        ]);

    if ($validator->fails()) {
        return response()->json($validator->errors());
    };

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->pasword)
    ]);

    $token = $user->createToken('auth_token')->plainTextToken;
    
    return response()->json([
        'data' => $user,
        'access_token' => $token,
        'token_type' => 'Bearer'
    ]);

    }
}
