<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowTopPageController extends Controller
{
    public function showTopPage() {
        return view('top');
    }
}
