<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $primaryKey = "id";

    protected $fillable = [
        'title',
        'desc',
        'publisher_id',
        'price',
        'book_avatar'
    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'id');
    }

    public function image(){
        return $this->hasMany(Image::class, 'id');
    }
}
