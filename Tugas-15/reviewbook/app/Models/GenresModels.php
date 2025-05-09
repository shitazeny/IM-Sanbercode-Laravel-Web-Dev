<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenresModels extends Model
{
    use HasFactory;
    protected $table = 'genres';

    protected $fillable = [
        'name',
        'description'
    ];
}
