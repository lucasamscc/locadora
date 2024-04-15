<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $table = 'rentals';
    protected $fillable = ['client_id', 'film_id', 'rent_date', 'return_date'];
    public $timestamps = false;

    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'film_id');
    }
}
