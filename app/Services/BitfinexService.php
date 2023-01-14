<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\BitcoinPriceLog;
use Illuminate\Support\Facades\Log;



class BitfinexService {

    public function getBitcoinPrice(){
        $response = Http::get('https://api.bitfinex.com/v1/pubticker/BTCUSD');

        if ($response->successful()){
            return $response->json();
        } else {
            Log::error('Bitfinex error response');
            return false;
        }
    }

    public function saveBitcoinPrice($price, $sourceTimestamp){
        $bitcoinPriceLog = new BitcoinPriceLog();

        $bitcoinPriceLog->price = $price;
        $bitcoinPriceLog->source_timestamp = $sourceTimestamp;
        $bitcoinPriceLog->save();
    }

    public function getAndSaveBitcoinPrice(){
        $data = $this->getBitcoinPrice();

        if ($data){
            $this->saveBitcoinPrice($data['volume'], $data['timestamp']);
        }
    }
}