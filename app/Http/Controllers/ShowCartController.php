<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ShowCartController extends Controller
{
    public function ShowCart() {

        $user = Auth::user();
        $userId = null;

        if ($user) {
            $userId = $user->id;
        } else {
            $userId = session()->get('tempUserId');
        }

        $orderAndOrderItemAndBook = $this->getOrderAndOrderItemAndBook($userId);

        return view('cart_list', ['orders' => $orderAndOrderItemAndBook]);
    }

    // /**
    //  * OrdersテーブルとOrderItemsテーブルとBooksテーブルを結合する.
    //  */
    public function getOrderAndOrderItemAndBook($userId, $status = 0) {
        $getOrderAndOrderItemAndBook = DB::table('orders as o')
        ->rightJoin('order_items as oi', 'o.id', '=', 'oi.order_id')
        ->join('books as b', 'oi.item_id', '=', 'b.id')
        ->select('o.id', 'o.user_id', 'o.status', 'o.total_price', 'o.order_date', 'o.destination_name', 'o.destination_email'
            , 'o.destination_zipcode', 'o.destination_address', 'o.destination_tel', 'o.delivery_time', 'o.payment_method'
            , 'oi.id as orderItem_id', 'oi.item_id as order_item_id', 'oi.quantity', 'oi.type', 'b.name', 'b.price_data', 'b.price_paperbook', 'b.description', 'b.image_path')
        ->where(['o.user_id' => $userId
            , 'o.status' => $status])
        ->get();

        return $getOrderAndOrderItemAndBook;
    }
}
