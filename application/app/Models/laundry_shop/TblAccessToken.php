<?php

namespace App\Models\laundry_shop;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class TblAccessToken extends SanctumPersonalAccessToken
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_access_token';
}
