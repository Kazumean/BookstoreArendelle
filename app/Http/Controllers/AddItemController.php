<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Http\Request;

class AddItemController extends Controller
{
    public function addItem(Request $request) {
        $order = null;
        $this->saveOrderItem($request, $order);

        return redirect('/showCart');
    }

    //order_itemsテーブルにデータを追加する.
    public function saveOrderItem($request, $order) {
        $orderItem = new Order_item();
        $orderItem->item_id = $request->item_id;
        $orderItem->order_id = $order->id;
        $orderItem->quantity = $request->quantity;
        $orderItem->type = $request->type;

        $orderItem->save();
    }

    //ordersテーブルにデータを追加する.
    public function saveOrder($request, $userId, $status = 0) {
        $order = new Order();
        $order->user_id = $userId;
        $order->status = $status;
        $item = Book::find($request->item_id);

        if($request->type == 'e-book') {
            $order->total_price = $item->price_data * $request->quantity;
        } else {
            $order->total_price = $item->price_paperbook * $request->quantity;
        }

        $order->save();
    }

    //OrdersテーブルとOrderItemsテーブルとBooksテーブルを結合する.
    public function getOrderAndOrderItemAndBook($userId, $status = 0) {
        $getOrderAndOrderItemAndBook = DB::table('orders as o')
        ->rightJoin('order_items as oi', 'o.id', '=', 'oi.order_id')
        ->join('books as b', 'oi.item_id', '=', 'b.id')
        ->select('o.user_id', 'o.status', 'o.total_price', 'o.order_date', 'o.destination_name', 'o.destination_email'
            , 'o.destination_zipcode', 'o.destination_address', 'o.destination_tel', 'o.delivery_time', 'o.payment_method'
            , 'oi.id', 'oi.quantity', 'oi.type', 'b.name', 'b.price_data', 'b.price_paperbook', 'b.image_path')
        ->get();

        return $getOrderAndOrderItemAndBook;
    }
}
