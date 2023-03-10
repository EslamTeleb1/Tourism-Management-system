<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Booking;
class Tour extends Model
{
    protected $fillable = [
        'id', 'slug', 'name'
    ];
    
      protected $casts = [
        'name'=>'array'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    use HasFactory;
}
