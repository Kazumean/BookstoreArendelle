<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_item;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddItemController extends Controller
{
    public function addItem(Request $request) {
        $user = Auth::user();

        //userがログインしているかどうかを判定する
        if ($user) {
            //orderの作成 or 取得
            $userId = $user->id;
            $order = null;
            $order = Order::where(['user_id' => $userId, 'status' => 0])->first();

            if ($order = null) {
                $this->saveOrder($request, $userId);
                $order = Order::where('user_id', $userId)->where('status', 0)->first();
            }
            dd($order);
            $this->saveOrderItem($request, $order);
            $this->setTotalPrice($userId);
        } else {
            //orderフィールドがあるかどうか
            $order = Order::find(session()->get('order_id'));
            if ($order) {
                //orderがあるとき
                $this->saveOrderItem($request, $order);
                $this->setTotalPrice($order->user_id);
            } else {
                //orderがないとき
                //仮のuser_idを作成
                $userId = null;
                do {
                    $userId = rand($min = -99999999, $max = -10000000);
                    $tmpOrder = Order::where('user_id', $userId)->first();
                } while ($tmpOrder != null);
                $this->saveOrder($request, $userId);
                $order = Order::where('user_id', $userId)->first();
                $this->saveOrderItem($request, $order);
                $this->setTotalPrice($userId);
                $request->session()->put('order_id', $order->id);
                $request->session()->put('tempUserId', $userId);
            }
        }

        return redirect('/showCart');
    }
    // /**
    //  * order_itemsテーブルにデータを追加する. 
    //  */
    public function saveOrderItem($request, $order) {
        $orderItem = new Order_item();
        // dd($order);
        $orderItem->item_id = $request->item_id;
        $orderItem->order_id = $order->id;
        $orderItem->quantity = $request->quantity;
        $orderItem->type = $request->type;

        $orderItem->save();
    }

    // /**
    //  * ordersテーブルにデータを追加する.
    //  */
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

    // /**
    //  * OrdersテーブルとOrderItemsテーブルとBooksテーブルを結合する.
    //  */
    public function getOrderAndOrderItemAndBook($userId, $status = 0) {
        $getOrderAndOrderItemAndBook = DB::table('orders as o')
        ->rightJoin('order_items as oi', 'o.id', '=', 'oi.order_id')
        ->join('books as b', 'oi.item_id', '=', 'b.id')
        ->select('o.id', 'o.user_id', 'o.status', 'o.total_price', 'o.order_date', 'o.destination_name', 'o.destination_email'
            , 'o.destination_zipcode', 'o.destination_address', 'o.destination_tel', 'o.delivery_time', 'o.payment_method'
            , 'oi.id', 'oi.quantity', 'oi.type', 'b.name', 'b.price_data', 'b.price_paperbook', 'b.image_path')
        ->get();

        return $getOrderAndOrderItemAndBook;
    }

    /**
     * OrdersテーブルとUsersテーブルを結合する.
     */
    public function getUserAndOrder($userId) {
        $getUserAndOrder = DB::table('users as u')
        ->join('orders as o', 'u.id', '=', 'o.user_id')
        ->select('u.name', 'u.email', 'u.password', 'u.zipcode', 'u.address', 'u.telephone', 'o.id', 'o.status', 'o.total_price'
            , 'o.order_date', 'o.destination_name', 'o.destination_email', 'o.destination_zipcode', 'o.destination_address'
            , 'o.destination_tel', 'o.delivery_time', 'o.payment_method')
        ->get();

        return $getUserAndOrder;
    }

    // /**
    //  * Ordersテーブルのtotal_priceに値をセットする.
    //  */
    public function setTotalPrice($userId) {
        //total_priceの更新
        $orderInfo = $this->getOrderAndOrderItemAndBook($userId);
        $totalPrice = 0;

        foreach($orderInfo as $order) {
            if ($order->type == 'e-book') {
                $price = $order->price_data;
            } else {
                $price = $order->price_paperbook;
            }
            $totalPrice += $price * $order->quantity;
        }
        $order = Order::where(['user_id' => $userId, 'status' => 0])->first();
        $order->total_price = $totalPrice;
        $order->save();
    }
}
