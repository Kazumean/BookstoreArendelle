<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderConfirmController extends Controller
{
    public function orderConfirm() {
        return view('order_confirm');
    }
}
