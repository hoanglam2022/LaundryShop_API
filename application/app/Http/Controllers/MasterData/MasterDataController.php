<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\BaseController;
use App\Http\Resources\BaseResource;
use App\Repositories\CustomerRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Http\JsonResponse;

class MasterDataController extends BaseController
{
    /**
     * Get all customers
     * @param CustomerRepository $repository
     * @return JsonResponse
     */
    public function customers(CustomerRepository $repository): JsonResponse
    {
        return (new BaseResource(CODE_SUCCESS,
            $repository->getAll()
        ))->response();
    }

    /**
     * Get all services
     * @param ServiceRepository $repository
     * @return JsonResponse
     */
    public function services(ServiceRepository $repository): JsonResponse
    {
        return (new BaseResource(CODE_SUCCESS, $repository->getAll()))->response();
    }
}
