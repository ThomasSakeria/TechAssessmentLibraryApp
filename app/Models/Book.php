<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Book extends Model
{
    /** @use HasFactory<\Database\Factories\BookFactory> */
    use HasFactory;

    protected $appends = ['src'];

    protected $fillable = [
        'title',
        'author',
        'description',
        'publisher',
        'category_id',
        'pageCount',
        'coverImage',
        'quantity',
        'checkout',
    ];

    public function category()
    {
        return $this->belongsTo(
            Category::class);
    }


    public function getSrcAttribute()
    {
        return asset("storage/{$this->coverImage}");
    }

}

