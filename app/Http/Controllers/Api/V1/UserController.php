<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function authUser(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'id' => $user->id,
            'name' => $user->user,
            'surname' => $user->surname,
            'lastname' => $user->lastname,
            'email' => $user->email,
            'age' => $user->age,
            'address' => $user->address,
            'gender' => $user->gender,
            'role_id' => $user->role_id
        ]);
    }
}
