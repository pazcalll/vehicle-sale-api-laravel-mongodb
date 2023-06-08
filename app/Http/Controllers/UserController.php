<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function register(): JsonResponse
    {
        $validatedData = request()->validate([
            'email' => ['required', 'email', 'max:24'],
            'password' => ['required', 'confirmed', 'max:24']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);

        $token = auth()->attempt([
            'email' => request()->email,
            'password' => request()->password
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function login(): JsonResponse
    {
        $validatedData = request()->validate([
            'email' => ['required', 'email', 'max:24'],
            'password' => ['required', 'max:24']
        ]);

        $token = Auth::attempt($validatedData);
        $user = Auth::user();
        return response()->json([
            'status' => 'success',
            'message' => 'User logged in successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }
}
