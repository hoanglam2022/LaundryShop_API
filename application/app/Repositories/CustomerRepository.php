<?php
namespace App\Repositories;

use App\Models\laundry_shop\MstCustomer;
use Illuminate\Database\Eloquent\Model;

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
}
