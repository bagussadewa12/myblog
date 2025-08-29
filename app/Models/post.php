<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model   // <-- huruf besar P
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'author',
        'thumbnail',
    ];
}
