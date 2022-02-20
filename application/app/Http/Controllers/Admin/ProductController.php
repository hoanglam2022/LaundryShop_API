<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Http\Resources\BaseResource;
use App\Repositories\ProductRepository;
use Illuminate\Http\JsonResponse;

class ProductController extends BaseController
{
    /**
     * Define
     */
    private ProductRepository $repository;

    /**
     * Init
     */
    public function __construct()
    {
        $this->repository = new ProductRepository();
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
     * @param ProductCreateRequest $request
     * @return JsonResponse
     */
    public function create(ProductCreateRequest $request): JsonResponse
    {
        return (new BaseResource(CODE_SUCCESS,
            $this->repository->create($request->all())
        ))->response();
    }

    /**
     * Update
     * @param $id
     * @param ProductUpdateRequest $request
     * @return JsonResponse
     */
    public function update($id, ProductUpdateRequest $request): JsonResponse
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
