<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Resources\BaseResource;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\JsonResponse;

class EmployeeController extends BaseController
{
    /**
     * Define
     */
    private EmployeeRepository $repository;

    /**
     * Init
     */
    public function __construct()
    {
        $this->repository = new EmployeeRepository();
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
     * @return JsonResponse
     */
    public function create(): JsonResponse
    {
        return (new BaseResource(CODE_SUCCESS,
            $this->repository->create(request()->all())
        ))->response();
    }

    /**
     * Update
     * @param $id
     * @return JsonResponse
     */
    public function update($id): JsonResponse
    {
        return (new BaseResource(CODE_SUCCESS,
            $this->repository->update($id, request()->all())
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
