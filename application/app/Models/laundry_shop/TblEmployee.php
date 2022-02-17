<?php

namespace App\Models\laundry_shop;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;

class TblEmployee extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_employee';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'created_on',
        'created_user',
        'updated_on',
        'updated_user',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    /**
     * Scope by username
     *
     * @param Builder $query
     * @param $username
     * @return Builder
     */
    public function scopeByUsername(Builder $query, $username): Builder
    {
        return is_array($username) ? $query->whereIn("$this->table.username", $username)
            : $query->where("$this->table.username", $username);
    }
}
