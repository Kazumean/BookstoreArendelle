<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class ShowBooksController extends Controller
{
    public function showBooks() {
        $books = Book::latest()->paginate(6);

        return view('item_list', compact('books'));
    }
}
