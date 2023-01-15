<?php 

namespace App\Services;
use App\Models\PriceSubscriptionNotification;
use Illuminate\Support\Facades\Log;
use Exception;

class PriceSubscriptionNotificationService {
    public function create($validatedRequest){
        try{
            PriceSubscriptionNotification::create($validatedRequest);
            $result = ['status' => true];
        } catch(Exception $e){
            Log::error('Error in PriceSubscriptionNotificationService->create: ' . $e->getMessage());
            $result = ['status' => false];
        }

        return $result;
    }
}