<?php 

namespace App\Services;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use App\Models\PriceSubscriptionNotification;
use App\Notifications\PriceSubscriptionNotificationIsAboveTheLimit;

class PriceSubscriptionNotificationService {
    public function create($validatedRequest){
        try{
            PriceSubscriptionNotification::updateOrCreate(['email' => $validatedRequest['email']], $validatedRequest);
            $result = ['status' => true];
        } catch(Exception $e){
            Log::error('Error in PriceSubscriptionNotificationService->create: ' . $e->getMessage());
            $result = ['status' => false];
        }

        return $result;
    }

    public function sendNotificationWhenPriceIsAboveTheLimit($price){
        try {
            $priceSubscriptionsForNotification = PriceSubscriptionNotification::where('price', '<', $price)
                ->where('is_above', false)
                ->get();

            if ($priceSubscriptionsForNotification->isNotEmpty()){
                
                foreach($priceSubscriptionsForNotification as $priceSubscription){
                    //send mail
                    Notification::route('mail', $priceSubscription->email)->notify(new PriceSubscriptionNotificationIsAboveTheLimit($price, $priceSubscription->price));
                    Log::info('Send notification to: ' . $priceSubscription->email . '. The price limit ' . $priceSubscription->price .' is above the price ' . $price);

                    $priceSubscription->is_above = true;
                    $priceSubscription->save();
                }
            }

            PriceSubscriptionNotification::setIsAboveSubscriptionWithPriceBelowLimit($price);

            return true;
        } catch(Exception $e){
            Log::error('Error in PriceSubscriptionNotificationService->sendNotificationWhenPriceIsAboveTheLimit: ' . $e->getMessage());

            return false;
        }
    }

    
}