<?php

namespace App\Models\laundry_shop;

use App\Models\BaseModel;

class TblGroupUser extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_group_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'group_id',
        'user_id',
        'created_on',
        'created_user',
        'updated_on',
        'updated_user',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];
}
