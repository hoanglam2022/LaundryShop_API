<?php

namespace App\Repositories;

use App\Models\laundry_shop\MstService;
use Illuminate\Database\Eloquent\Model;

class ServiceRepository extends BaseRepository implements BaseRepositoryInterface
{
    /**
     * get model
     * @return Model
     */
    public function getModel(): Model
    {
        return new MstService();
    }
}
