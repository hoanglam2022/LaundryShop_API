<?php
namespace App\Repositories;

use App\Models\laundry_shop\TblEmployee;
use Illuminate\Database\Eloquent\Model;

class EmployeeRepository extends BaseRepository implements BaseRepositoryInterface
{
    /**
     * get model
     * @return Model
     */
    public function getModel(): Model
    {
        return new TblEmployee();
    }
}
