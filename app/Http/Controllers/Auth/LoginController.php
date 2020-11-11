<?php

namespace App\Http\Controllers\Auth;

use JWTAuth;
use App\Models\User;
use App\Http\Requests\UserLogin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\JsonResponse as Response;

class LoginController extends Controller {
    public function __invoke(UserLogin $request) {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(
                    ['error' => 'Invalid credentials!'],
                    Response::HTTP_BAD_REQUEST
                );
            }
        } catch (JWTException $e) {
            return response()->json(
                ['error' => 'Could not create token!'],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }
        return response()->json(
            compact('token'), Response::HTTP_OK
        );
    }
}
