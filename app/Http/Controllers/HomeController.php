<?php

namespace App\Http\Controllers;

use App\Ad;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ads = Ad::all();
        $user_id = Auth::id();
        return view('home',
            [
                'ads' => $ads,
                'user_id' => $user_id
            ]
        );
    }
}
