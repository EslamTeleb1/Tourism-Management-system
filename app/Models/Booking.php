<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tour;
class Booking extends Model
{

     protected $fillable = [
        'tour_id', 'email', 'name', 'phone', 'adults','total_price',
    ];

      public function calculatePrice($adults)
      {
        if ($adults == 1) {
            return 120;
        } elseif ($adults >= 2 && $adults <= 3) {
            return 100;
        } elseif ($adults >= 4 && $adults <= 6) {
            return 90;
        }

        return 0;
      }

     public function tourInfo()
       {

        return $this->belongsTo(Tour::class);
        
       }

    use HasFactory;
}
