<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $table = 'rentals';
    protected $fillable = ['client_id', 'film_id', 'rent_date', 'return_date'];

    use HasFactory;
}
