<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
    'book_id',
    'user_id',
    'rating',
    'comment'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
}
}
