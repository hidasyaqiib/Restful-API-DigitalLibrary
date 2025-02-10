<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'writer',
        'user_id',
        'category_id',
        'publisher',
        'year',
        'stock'
    ];

    // relasi dengan tabel category
    public function category ()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
