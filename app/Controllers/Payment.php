<?php

namespace App\Controllers;
use App\Models\PaketModel;
use App\Models\UserModel;

class Payment extends BaseController
{
    public function index()
    {
        \Midtrans\Config::$serverKey = '';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
        ];
        $data = [
            'snapToken' => \Midtrans\Snap::getSnapToken($params),
        ];
        return view('front/booking/payment', $data);
    }
}