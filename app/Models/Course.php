<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'instructor',
        'description', // Added description field
        'topics',      // Added topics field
        'thumbnail',
        'views',
        'time',
        'category',
        'level',
        'duration',
        'lessons',
        'price',
    ];
}