<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Validation\ValidationException;

class AuthController
{
    public function login(Request $request)
    {
        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Username atau password salah!'
            ], 401);
        }

        $tokenResult = $user->createToken('auth_token');
        $token = $tokenResult->plainTextToken;

        $tokenResult->accessToken->expires_at = now()->addDays(7);
        $tokenResult->accessToken->save();

        return response()->json([
            'status' => true,
            'message' => 'Login berhasil',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_at' => '7 Day left',
            'id_user' => $user->id_user,
            'name' => $user->name,
            'username' => $user->username,
            'role' => $user->role,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Telah keluar']);
    }
}
