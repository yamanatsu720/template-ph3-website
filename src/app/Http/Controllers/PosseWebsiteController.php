<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosseWebsiteController extends Controller
{
    public function index()
    {
        return view('website.top'); // resources/views/website/top.blade.php を表示
    }
}