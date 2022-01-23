<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model {
    protected $primaryKey = 'email';
	protected $fillable = ['email', 'token'];
    protected $keyType = 'string';
}
