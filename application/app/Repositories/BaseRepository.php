<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct()
    {
        $this->setModel();
    }

    /**
     * get model
     * @return Model
     */
    abstract public function getModel(): Model;

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = $this->getModel();
    }

    /**
     * Get all
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Paginate
     * @param array $queries
     * @return mixed
     */
    public function paginate(array $queries = [])
    {
        $default_limit  = config('paginate.default.per_page');
        $default_page   = config('paginate.default.page');
        $default_prefix = config('paginate.default.prefix');
        $limit          = (int)Arr::get($queries, 'limit', $default_limit);
        $page           = (int)Arr::get($queries, 'page', $default_page);
        return $this->model->paginate($limit, ['*'], $default_prefix, $page);
    }

    /**
     * Get one
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes = [])
    {
        return $this->model->create($attributes);
    }

    /**
     * Update
     * @param int $id
     * @param array $attributes
     * @return mixed
     */
    public function update(int $id, array $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    /**
     * Delete
     * @param int $id
     * @return mixed
     */
    public function delete(int $id): bool
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
}
