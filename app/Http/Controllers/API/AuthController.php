<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use App\Traits\ApiResponseTrait;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    use ApiResponseTrait;

    // User Registration API
    public function register(Request $request)
    {
        try {
            $validator = FacadesValidator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors(), 'Validation error', 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $token = $user->createToken('MyAppToken')->plainTextToken;

            return $this->successResponse([
                'token' => $token,
                'user' => new UserResource($user),
            ], 'User registered successfully.');
        } catch (\Throwable $e) {
            Log::error('Register error: ' . $e->getMessage(), ['exception' => $e]);
            return $this->errorResponse(null, 'Registration failed. Please try again later.', 500);
        }
    }

    // User Login API
    public function login(Request $request)
    {
        try {
            if (!Auth::attempt($request->only('email', 'password'))) {
                return $this->errorResponse(null, 'Unauthorized', 401);
            }

            $user = Auth::user();
            $token = $user->createToken('MyAppToken')->plainTextToken;

            return $this->successResponse([
                'token' => $token,
                'user' => new UserResource($user),
            ], 'Login successful.');
        } catch (\Throwable $e) {
            Log::error('Login error: ' . $e->getMessage(), ['exception' => $e]);
            return $this->errorResponse(null, 'Login failed. Please try again later.', 500);
        }
    }

    // User Profile API (Protected)
    public function profile(Request $request)
    {
        try {
            return $this->successResponse([
                'user' => new UserResource($request->user()),
            ]);
        } catch (\Throwable $e) {
            Log::error('Profile error: ' . $e->getMessage(), ['exception' => $e]);
            return $this->errorResponse(null, 'Failed to fetch profile.', 500);
        }
    }

    // User Logout API
    public function logout(Request $request)
    {
        try {
            $request->user()->tokens()->delete();
            return $this->successResponse(null, 'Logout successful.');
        } catch (\Throwable $e) {
            Log::error('Logout error: ' . $e->getMessage(), ['exception' => $e]);
            return $this->errorResponse(null, 'Logout failed. Please try again later.', 500);
        }
    }
}
