<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
     protected $fillable = [
        'title',
        'discription',
        'image',
        'slug',
        'category_id',
        
    ];
}
