<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostPriceSubscriptionNotificationRequest;
use App\Services\PriceSubscriptionNotificationService;

class PriceSubscriptionNotificationController extends Controller
{
    private $PriceSubscriptionNotificationService;

    function __construct()
    {
        $this->PriceSubscriptionNotificationService = new PriceSubscriptionNotificationService();
    }

    public function store(PostPriceSubscriptionNotificationRequest $request){
        return response()->json($this->PriceSubscriptionNotificationService->create($request->validated()));
    }
}
