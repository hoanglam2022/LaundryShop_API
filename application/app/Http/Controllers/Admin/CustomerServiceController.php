<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\CustomerService\CustomerServiceCreateRequest;
use App\Http\Requests\CustomerService\CustomerServiceUpdateRequest;
use App\Http\Resources\BaseResource;
use App\Repositories\CustomerServiceRepository;
use Illuminate\Http\JsonResponse;

class CustomerServiceController extends BaseController
{
    /**
     * Define
     */
    private CustomerServiceRepository $repository;

    /**
     * Init
     */
    public function __construct()
    {
        $this->repository = new CustomerServiceRepository();
    }

    /**
     * Index
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return (new BaseResource(CODE_SUCCESS,
            $this->repository->paginate(request()->all())
        ))->response();
    }

    /**
     * Find one
     * @param $id
     * @return JsonResponse
     */
    public function find($id): JsonResponse
    {
        return (new BaseResource(CODE_SUCCESS,
            $this->repository->find($id)
        ))->response();
    }

    /**
     * Create
     * @param CustomerServiceCreateRequest $request
     * @return JsonResponse
     */
    public function create(CustomerServiceCreateRequest $request): JsonResponse
    {
        return (new BaseResource(CODE_SUCCESS,
            $this->repository->updateOrCreate(['customer_id', 'service_id'], ['price'], $request->all())
        ))->response();
    }

    /**
     * Delete
     * @param $id
     * @return JsonResponse
     */
    public function delete($id): JsonResponse
    {
        return (new BaseResource(CODE_SUCCESS,
            $this->repository->delete($id)
        ))->response();
    }
}
