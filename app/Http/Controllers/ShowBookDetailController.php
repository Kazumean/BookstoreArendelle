<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ShowBookDetailController extends Controller
{
    /**
     * 本の詳細を表示する.
     */
    public function showDetail($book_id) {
        $book = Book::find($book_id)->getCategoriesAndCountries();
        // dd($book);
    
        return view('item_detail', compact('book'));
    }

    /**
     * BooksテーブルとCategoriesテーブルとCountriesテーブルを結合する.
     */
    public function getCategoriesAndCountries() {
        $categoriesAndCountries = DB::table('books as b')
        ->join('categories as ca', 'b.category_id', '=', 'ca.id')
        ->join('countries as co', 'b.country_id', '=', 'co.id')
        ->select('ca.name as category_name', 'co.name as country_name', 'co.area_id'
            , 'b.id as book_id', 'b.name as book_name', 'b.author_name', 'b.description'
            , 'b.price_data', 'b.price_paperbook', 'b.image_path', 'b.deleted')
        ->get();

        return $categoriesAndCountries;
    }
}
