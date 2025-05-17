<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genresModel extends Model
{
    use HasFactory;
    protected $table = 'genres';

    protected $fillable = [
        'name',
        'description'
    ];
}
