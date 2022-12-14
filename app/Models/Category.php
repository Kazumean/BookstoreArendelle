<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * このカテゴリーに属する本
     */
    public function books() {
        return $this->belongsTo(Book::class);
    }
}
