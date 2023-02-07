<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $fillable = [
        'email', 'name', 'phone', 'quantity', 'total_price'
    ];

    public function calculatePrice($quantity)
    {
        if ($quantity == 1) {
            return 120;
        } elseif ($quantity >= 2 && $quantity <= 3) {
            return 100;
        } elseif ($quantity >= 4 && $quantity <= 6) {
            return 90;
        }

        return 0;
    }

    use HasFactory;
}
