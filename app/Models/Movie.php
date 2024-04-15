<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = 'movies';
    protected $fillable = ['title', 'director', 'year', 'genre', 'price', 'avaiable'];
    public $timestamps = false;
    
    use HasFactory;
}
