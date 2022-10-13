<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    use HasFactory;

    /**
     * BooksテーブルとCategoriesテーブルとCountriesテーブルを結合する.
     */
    public function getCategoriesAndCountries($book) {
        $categoriesAndCountries = DB::table('books as b')
        ->join('categories as ca', 'b.category_id', '=', 'ca.id')
        ->join('countries as co', 'b.country_id', '=', 'co.id')
        ->select('ca.name as category_name', 'co.name as country_name', 'co.area_id'
            , 'b.id as book_id', 'b.name as book_name', 'b.author_name', 'b.description'
            , 'b.price_data', 'b.price_paperbook', 'b.image_path', 'b.deleted')
        ->where('b.book_id', $book->id)
        ->get();

        return $categoriesAndCountries;
    }
}
