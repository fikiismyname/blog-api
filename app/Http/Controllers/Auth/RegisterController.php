<?php

namespace App\Http\Controllers\Auth;

use JWTAuth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRegister;
use Illuminate\Http\JsonResponse as Response;

class RegisterController extends Controller {
    public function __invoke(UserRegister $request) {
        try {
            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
            ]);
            $token = JWTAuth::fromUser($user);
            return response()->json(
                compact('user', 'token'),
                Response::HTTP_CREATED
            );
        } catch(Exception $exception) {
            return response()->json([
                'message'   => $exception->getMessage()
            ]);
        }
    }
}
