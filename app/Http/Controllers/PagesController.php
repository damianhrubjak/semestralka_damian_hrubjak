<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homePage()
    {
        $newestProducts = Product::with('files')->orderBy('created_at', 'DESC')->take(3)->get();
        return view('pages.home', compact('newestProducts'));
    }
}
