<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class usersModel extends Authenticatable
{
    use HasFactory;
    protected $table = 'tbl_users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    public function profile()
    {
        return $this->hasOne(profileModel::class, 'user_id');
    }
}
