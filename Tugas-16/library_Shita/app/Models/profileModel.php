<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class profileModel extends Model
{
    use HasFactory;
    protected $table = 'profile';

    protected $fillable = [
        'age',
        'address',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(usersModel::class, 'user_id');
    }

}
