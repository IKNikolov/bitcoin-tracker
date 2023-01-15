<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceSubscriptionNotification extends Model
{
    use HasFactory;

    protected $fillable = ['price', 'email'];

    public static function setIsAboveSubscriptionWithPriceBelowLimit($price){
        self::where('price', '>', $price)
            ->where('is_above', true)
            ->update(['is_above' => false]);
    }
}
