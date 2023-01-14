<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BitcoinPriceLog extends Model
{
    use HasFactory;

    protected $dates = [
        'source_timestamp'
    ];
}
