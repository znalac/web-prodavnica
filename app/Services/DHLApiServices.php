<?php

namespace App\Http\Controllers;

use App\Services\DHLApiService;

class ShippingController extends Controller
{
    protected $dhl;

    public function __construct(DHLApiService $dhl)
    {
        $this->dhl = $dhl;
    }

    public function getRates()
    {
        $data = [
            // ... request data
        ];

        $rates = $this->dhl->getRates($data);

        // ... handle response
    }
}