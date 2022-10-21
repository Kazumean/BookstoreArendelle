<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OrderConfirmController extends Controller
{
    public function orderConfirm() {

        $user = Auth::user();
        $userId = null;

        if ($user) {
            $userId = $user->id;
        } else {
            return redirect('/login');
        }
        $orderAndOrderItemAndBook = $this->getOrderAndOrderItemAndBook($userId);

        if($orderAndOrderItemAndBook->isEmpty()) {
            return redirect()->route('book.showCart');
        }

        return view('order_confirm', [
            'orderConfirms' => $orderAndOrderItemAndBook
            , 'user' => $user]);
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
            , 'oi.id', 'oi.item_id as order_item_id', 'oi.quantity', 'oi.type', 'b.name', 'b.price_data', 'b.price_paperbook', 'b.description', 'b.image_path')
        ->where(['o.user_id' => $userId
            , 'o.status' => $status])
        ->get();

        return $getOrderAndOrderItemAndBook;
    }
}
