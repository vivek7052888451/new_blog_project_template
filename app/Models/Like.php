<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
      protected $fillable = [
        'userid',
        'username',
        'like_status',
        'blog_id',
       
    ];
}
