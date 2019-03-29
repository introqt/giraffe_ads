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
        $ads = Ad::all();

        return view('home', compact('ads'));
    }
}
