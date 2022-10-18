<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowCartController extends Controller
{
    public function ShowCart() {

        $orderAndOrderItemAndBook = $this->getOrderAndOrderItemAndBook();

        return view('cart_list', ['orders' => $orderAndOrderItemAndBook]);
    }

    //OrdersテーブルとOrderItemsテーブルとBooksテーブルを結合する.
    public function getOrderAndOrderItemAndBook() {
        $getOrderAndOrderItemAndBook = DB::table('orders as o')
        ->join('order_items as oi', 'o.id', '=', 'oi.order_id')
        ->join('books as b', 'oi.item_id', '=', 'b.id')
        ->select('o.user_id', 'o.status', 'o.total_price', 'o.order_date', 'o.destination_name', 'o.destination_email'
            , 'o.destination_zipcode', 'o.destination_address', 'o.destination_tel', 'o.delivery_time', 'o.payment_method'
            , 'oi.id', 'oi.quantity', 'oi.type', 'b.name', 'b.price_data', 'b.price_paperbook', 'b.image_path')
        ->get();

        return $getOrderAndOrderItemAndBook;
    }
}
