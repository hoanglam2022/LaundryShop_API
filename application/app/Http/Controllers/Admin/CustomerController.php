<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Customer\CustomerCreateRequest;
use App\Http\Requests\Customer\CustomerUpdateRequest;
use App\Http\Resources\BaseResource;
use App\Repositories\CustomerRepository;
use Illuminate\Http\JsonResponse;

class CustomerController extends BaseController
{
    /**
     * Define
     */
    private CustomerRepository $repository;

    /**
     * Init
     */
    public function __construct()
    {
        $this->repository = new CustomerRepository();
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
     * @param CustomerCreateRequest $request
     * @return JsonResponse
     */
    public function create(CustomerCreateRequest $request): JsonResponse
    {
        return (new BaseResource(CODE_SUCCESS,
            $this->repository->create($request->all())
        ))->response();
    }

    /**
     * Update
     * @param $id
     * @param CustomerUpdateRequest $request
     * @return JsonResponse
     */
    public function update($id, CustomerUpdateRequest $request): JsonResponse
    {
        return (new BaseResource(CODE_SUCCESS,
            $this->repository->update($id, $request->all())
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
