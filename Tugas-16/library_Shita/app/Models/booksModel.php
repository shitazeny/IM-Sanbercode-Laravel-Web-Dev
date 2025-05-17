<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booksModel extends Model
{
    use HasFactory;
    protected $table = 'books';

    protected $fillable = [
        'title',
        'summary',
        'image',
        'stok',
        'genre_id',
    ];

    public function genre()
    {
        return $this->belongsTo(genresModel::class, 'genre_id');
    }

    public function comments()
    {
        return $this->hasMany(commentsModel::class, 'book_id');
    }
}
