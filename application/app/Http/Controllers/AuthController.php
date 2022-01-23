<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller {

    /**
     * Register
     *
     * @param UserRegisterRequest $request
     * @return UserResource|void
     */
    public function register(UserRegisterRequest $request) {
        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        if (!$token = auth()->attempt($request->only(['email', 'password']))) {
            return abort(401);
        };

        return (new UserResource($request->user()))->additional([
            'meta' => [
                'token' => $token,
            ],
        ]);
    }

    /**
     * Login
     *
     * @param UserLoginRequest $request
     * @return UserResource|\Illuminate\Http\JsonResponse
     */
    public function login(UserLoginRequest $request) {
        if (!$token = auth()->attempt($request->only(['email', 'password']))) {
            return response()->json([
                'errors' => [
                    'password' => ['Password is incorrect'],
                ],
            ], 422);
        };

        return (new UserResource($request->user()))->additional([
            'meta' => [
                'token' => $token,
            ],
        ]);
    }

    /**
     * Get detail
     *
     * @param Request $request
     * @return UserResource
     */
    public function user(Request $request) {
        return new UserResource($request->user());
    }

    /**
     * Log out
     */
    public function logout() {
        if (auth()->check()){
            auth()->logout();
        }
    }
}
