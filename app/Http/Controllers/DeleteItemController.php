<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Order_item;
use Illuminate\Support\Facades\DB;

class DeleteItemController extends Controller
{
    public function deleteItem($orderItem_id) {
        Order_item::destroy($orderItem_id);
        return redirect()->route('book.showCart');
    }
}
