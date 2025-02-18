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
        'year'
    ];

    public function user()
    {
        return $this->belongsTo(User2::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function loans()
    {
        return $this->hasMany(loans::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
