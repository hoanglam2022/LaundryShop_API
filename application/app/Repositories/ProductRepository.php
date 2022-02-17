<?php
namespace App\Repositories;

use App\Models\laundry_shop\MstProduct;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends BaseRepository implements BaseRepositoryInterface
{
    /**
     * get model
     * @return Model
     */
    public function getModel(): Model
    {
        return new MstProduct();
    }
}
