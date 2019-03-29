<?php

namespace App\Http\Controllers;

use App\Ad;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ads = Ad::orderBy('created_at', 'desc')->paginate(3);

        return view('home', compact('ads'));
    }
}
