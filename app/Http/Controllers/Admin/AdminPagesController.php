<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Inspiring;

class AdminPagesController extends Controller
{
    public function index()
    {
        $quote = Inspiring::quote();
        return view('admin.pages.home', compact('quote'));
    }
}
