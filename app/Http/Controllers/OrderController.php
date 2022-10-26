<?php

namespace App\Http\Controllers;

use App\Rules\TelephoneRule;
use App\Rules\ZipcodeRule;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function createOrder(Request $request) {

        $request->validate([
            'destination_name' => ['required', 'min:1', 'max:255'],
            'destination_email' => ['required', 'string', 'email'],
            'destination_zipcode' => ['required', new ZipcodeRule],
            'destination_address' => ['required', 'string'],
            'destination_tel' => ['required', 'string', new TelephoneRule],
            'delivery_date' => ['required', 'after:today'],
            'payment_method' => ['required'],
        ]);

        $userId = Auth::user()->id;

        //userIdでカート検索（未注文のもの）
        $order = Order::where('user_id', $userId)->where('status',0)->first();

        return redirect('/order');
    }
}
