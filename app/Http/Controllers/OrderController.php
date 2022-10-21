<?php

namespace App\Http\Controllers;

use App\Rules\TelephoneRule;
use App\Rules\ZipcodeRule;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function createOrder(Request $request) {

        $request->validate ([
            'destination_name' => ['required', 'string'],
            'destination_email' => ['required', 'string', 'email'],
            'destination_zipcode' => ['required', new ZipcodeRule],
            'destination_address' => ['required'],
            'destination_tel' => ['required', 'string', new TelephoneRule],
            // 'delivery_time' => ['required'],
            // 'payment_method' => ['required'],
        ]);
        return redirect('order_finished');
    }
}
