<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\LoginRequest;
use App\Http\Requests\Api\V1\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthorizationController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return response()->json(
                [
                    'message' => 'Неправильный логин или пароль'
                ],
                401
            );
        }

        $user = User::where('email', $request->email)->first();

        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user->toArray()
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $data->password = Hash::make($data->password);

        if (!$data['role_id']) $data['role_id'] = 0; 

        $user = User::create($data);

        Auth::login($user);

        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'token' => $token
        ]);
    }
}
