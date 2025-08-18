<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
  protected $fillable = [
        'title',
        'slug',
        'content',
        'author',
        'thumbnail', // ganti dari image ke thumbnail
    ];
}
