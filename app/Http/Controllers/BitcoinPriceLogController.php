<?php

namespace App\Http\Controllers;

use App\Models\BitcoinPriceLog;
use Illuminate\Http\Request;
use App\Http\Resources\BitcoinPriceLogResource;
use App\Services\BitfinexService;

class BitcoinPriceLogController extends Controller
{
    private $BitfinexService;

    function __construct()
    {
        $this->BitfinexService = new BitfinexService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return response()->json($this->BitfinexService->getDataForChart());
    }
}
