<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LetestNews extends Model
{
    protected $fillable = [
        'title',
        'date',
        'details',
        'image',
    ];
    
    use HasFactory;
}
