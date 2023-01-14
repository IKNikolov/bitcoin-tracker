<?php

namespace App\Http\Controllers;

use App\Models\BitcoinPriceLog;
use Illuminate\Http\Request;
use App\Jobs\GetBitcoinPriceFromBitfinexJob;
use App\Services\BitfinexService;

class BitcoinPriceLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //GetBitcoinPriceFromBitfinexJob::dispatch();
        $BitfinexService = new BitfinexService();
        $BitfinexService->getAndSaveBitcoinPrice();
        return response()->json(['success' => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BitcoinPriceLog  $bitcoinPriceLog
     * @return \Illuminate\Http\Response
     */
    public function show(BitcoinPriceLog $bitcoinPriceLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BitcoinPriceLog  $bitcoinPriceLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BitcoinPriceLog $bitcoinPriceLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BitcoinPriceLog  $bitcoinPriceLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(BitcoinPriceLog $bitcoinPriceLog)
    {
        //
    }
}
