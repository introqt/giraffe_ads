<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Http\Requests\SaveAdRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ads = Ad::all();
        $user_id = Auth::id();
        $times_for_humans = [];
        foreach ($ads as $ad) {
            array_push($times_for_humans, Carbon::instance($ad->created_at)->diffForHumans());
        }
        return view('home',
            [
                'ads' => $ads,
                'user_id' => $user_id,
                'time' => $times_for_humans
            ]
        );
    }

    public function create()
    {
        return view('create');
    }

    public function save(SaveAdRequest $request)
    {
        $ad = new Ad();
        $ad->saveAd($request);

        return redirect('home');
    }

    public function show(Ad $ad)
    {
        dump($ad);
    }
}
