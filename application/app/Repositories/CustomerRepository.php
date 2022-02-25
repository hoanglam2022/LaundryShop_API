<?php

namespace App\Repositories;

use App\Models\laundry_shop\MstCustomer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class CustomerRepository extends BaseRepository implements BaseRepositoryInterface
{
    /**
     * get model
     * @return Model
     */
    public function getModel(): Model
    {
        return new MstCustomer();
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes = [])
    {
        return $this->model->create([
            'username'     => Arr::get($attributes, 'username'),
            'password'     => bcrypt(Arr::get($attributes, 'password')),
            'first_name'   => Arr::get($attributes, 'first_name'),
            'last_name'    => Arr::get($attributes, 'last_name'),
            'email'        => Arr::get($attributes, 'email'),
            'phone_number' => Arr::get($attributes, 'phone_number'),
        ]);
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
            $result->update([
                'password'     => bcrypt(Arr::get($attributes, 'password')),
                'first_name'   => Arr::get($attributes, 'first_name'),
                'last_name'    => Arr::get($attributes, 'last_name'),
                'email'        => Arr::get($attributes, 'email'),
                'phone_number' => Arr::get($attributes, 'phone_number'),
            ]);
            return $result;
        }

        return false;
    }
}
