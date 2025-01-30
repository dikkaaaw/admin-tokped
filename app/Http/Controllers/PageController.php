<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function page($page)
    {
        return view('public.' . $page);
    }

    public function index()
    {
        return view('public.homepage');
    }
}
