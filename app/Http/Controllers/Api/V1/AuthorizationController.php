<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\LoginRequest;
use App\Http\Requests\Api\V1\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Response;
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
                Response::HTTP_UNAUTHORIZED
            );
        }

        $request->session()->regenerate();

        return response()->json(
            [
                'user' => $request->user()
            ],
            Response::HTTP_CREATED
        );
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $data->password = Hash::make($data->password);

        if (!$data['role_id']) $data['role_id'] = 0;

        $user = User::create($data);

        Auth::login($user);

        return response()->json(
            [
                'message' => 'Регистрация выполнена!'
            ],
            Response::HTTP_CREATED
        );
    }
}
