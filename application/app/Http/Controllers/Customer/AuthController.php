<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\BaseController;
use App\Http\Requests\MstCustomerLoginRequest;
use App\Http\Requests\MstCustomerRegisterRequest;
use App\Http\Resources\BaseResource;
use App\Http\Resources\MstCustomerResource;
use App\Models\laundry_shop\MstCustomer;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Throwable;

class AuthController extends BaseController
{
    /**
     * Register
     *
     * @param MstCustomerRegisterRequest $request
     * @return JsonResponse
     */
    public function register(MstCustomerRegisterRequest $request): JsonResponse
    {
        // Response
        $code        = CODE_SERVER_ERROR;
        $error_field = '';

        try {
            // Create mst user
            $mst_user = MstCustomer::create([
                'username'     => $request->input('username'),
                'password'     => bcrypt($request->input('password')),
                'first_name'   => $request->input('first_name'),
                'last_name'    => $request->input('last_name'),
                'email'        => $request->input('email'),
                'phone_number' => $request->input('phone_number'),
            ]);

            $resource = (new MstCustomerResource(CODE_SUCCESS, $mst_user));
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
     * @param MstCustomerLoginRequest $request
     * @return JsonResponse
     */
    public function getToken(MstCustomerLoginRequest $request): JsonResponse
    {
        // Get from request
        $username = $request->get('username');
        $password = $request->get('password');

        // Response
        $code        = CODE_SERVER_ERROR;
        $error_field = '';

        try {
            if (!Auth::guard(GUARD_CUSTOMER)->attempt([
                'username' => $username,
                'password' => $password
            ])) {
                $error_field = 'password';
                $code        = CODE_UNPROCESSABLE_ENTITY;
                throw new Exception('Mật khẩu không đúng.');
            }

            $customer = Auth::guard(GUARD_CUSTOMER)->user();
            $token    = $customer->createToken(get_app_name(), [GUARD_CUSTOMER])->plainTextToken;
            $resource = (new MstCustomerResource(CODE_SUCCESS, $customer))->additional([
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
        if (auth(GUARD_CUSTOMER)->check()) {
            auth(GUARD_CUSTOMER)->logout();
        }
    }
}
