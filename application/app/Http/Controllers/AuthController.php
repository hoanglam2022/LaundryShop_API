<?php

namespace App\Http\Controllers;

use App\Http\Requests\MstUserLoginRequest;
use App\Http\Requests\MstUserRegisterRequest;
use App\Http\Resources\BaseResource;
use App\Http\Resources\MstUserResource;
use App\Models\laundry_shop\MstUser;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Throwable;

class AuthController extends BaseController
{
    /**
     * Register
     *
     * @param MstUserRegisterRequest $request
     * @return JsonResponse
     */
    public function register(MstUserRegisterRequest $request): JsonResponse
    {
        // Response
        $code        = CODE_SERVER_ERROR;
        $error_field = '';

        try {
            // Create mst user
            $mst_user = MstUser::create([
                'username'     => $request->input('username'),
                'password'     => bcrypt($request->input('password')),
                'first_name'   => $request->input('first_name'),
                'last_name'    => $request->input('last_name'),
                'email'        => $request->input('email'),
                'phone_number' => $request->input('phone_number'),
            ]);

            $resource = (new MstUserResource(CODE_SUCCESS, $mst_user));
        }
        catch (Throwable $throwable) {
            // Render resource
            $error_msg = $throwable->getMessage();
            $resource  = (new BaseResource($code, null, [
                $error_field => [$error_msg],
            ]));
        }

        return $resource->response();
    }

    /**
     * Get token
     *
     * @param MstUserLoginRequest $request
     * @return JsonResponse
     */
    public function getToken(MstUserLoginRequest $request): JsonResponse
    {
        // Get from request
        $username = $request->get('username');
        $password = $request->get('password');

        // Response
        $code        = CODE_SERVER_ERROR;
        $error_field = '';

        try {
            if (!Auth::attempt([
                'username' => $username,
                'password' => $password
            ])) {
                $error_field = 'password';
                $code        = CODE_UNPROCESSABLE_ENTITY;
                throw new Exception('Mật khẩu không đúng.');
            }

            $mst_user = Auth::user();
            $token    = $mst_user->createToken('mst_user')->accessToken->token;
            $resource = (new MstUserResource(CODE_SUCCESS, $mst_user))->additional([
                'meta' => [
                    'token' => $token,
                ],
            ]);
        }
        catch (Throwable $throwable) {
            // Render resource
            $error_msg = $throwable->getMessage();
            $resource  = (new BaseResource($code, null, [
                $error_field => [$error_msg],
            ]));
        }

        return $resource->response();
    }

    /**
     * Log out
     */
    public function logout()
    {
        if (auth()->check()) {
            auth()->logout();
        }
    }
}
