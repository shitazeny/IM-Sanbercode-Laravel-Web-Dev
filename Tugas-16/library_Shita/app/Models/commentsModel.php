<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentsModel extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable = [
        'content',
        'user_id', 
        'book_id'
    ];

    public function book()
    {
        return $this->belongsTo(booksModel::class, 'book_id');
    }

    public function user()
    {
        return $this->belongsTo(usersModel::class, 'user_id');
    }
}
