<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Services\BitfinexService;
use App\Services\PriceSubscriptionNotificationService;

class GetBitcoinPriceAndSendNotificationsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $BitfinexService;
    protected $PriceSubscriptionNotificationService;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->BitfinexService = new BitfinexService();
        $this->PriceSubscriptionNotificationService = new PriceSubscriptionNotificationService();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $lastBitcoinPrice = $this->BitfinexService->getAndSaveBitcoinPrice();

        if ($lastBitcoinPrice !== false){
            $this->PriceSubscriptionNotificationService->sendNotificationWhenPriceIsAboveTheLimit($lastBitcoinPrice);
        }
    }
}
