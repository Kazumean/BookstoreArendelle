<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowCartController extends Controller
{
    public function ShowCart() {
        return view('cart_list');
    }
}
