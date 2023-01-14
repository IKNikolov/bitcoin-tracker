<?php

namespace App\Http\Controllers;

use App\Models\BitcoinPriceLog;
use Illuminate\Http\Request;
use App\Http\Resources\BitcoinPriceLogResource;

class BitcoinPriceLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BitcoinPriceLogResource::collection(BitcoinPriceLog::all());
    }
}
