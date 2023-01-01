<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $primaryKey = "id";

    protected $fillable = [
        'book_id',
        'image'
    ];

    public function book(){
        return $this->belongsTo(Book::class, 'id');
    }
}
