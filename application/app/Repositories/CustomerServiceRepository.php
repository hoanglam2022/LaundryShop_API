<?php

namespace App\Repositories;

use App\Models\laundry_shop\TblCustomerService;
use Illuminate\Database\Eloquent\Model;

class CustomerServiceRepository extends BaseRepository implements BaseRepositoryInterface
{
    /**
     * get model
     * @return Model
     */
    public function getModel(): Model
    {
        return new TblCustomerService();
    }
}
