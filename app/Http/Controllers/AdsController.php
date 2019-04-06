<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Http\Requests\SaveAdRequest;
use Illuminate\Support\Facades\Auth;

class AdsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create ad';

        return view('ads.create', compact('title'));
    }

    /**
     * Send request to finish creating a new resource
     * @param SaveAdRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(SaveAdRequest $request)
    {
        Ad::create($request->all());

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::findOrFail($id);
        $data = [
            'ad' => $ad,
            'title' => $ad->title,
        ];

        return view('ads.show', $data);
    }

    /**
     * @param Ad $ad
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Ad $ad)
    {
        return view('ads.edit', compact('ad'));
    }

    /**
     * @param SaveAdRequest $request
     * @param Ad $ad
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(SaveAdRequest $request, Ad $ad)
    {
        if (Auth::id() === $ad->user_id) {
            $ad->update($request->all());
        }

        return redirect(route('ads.show', ['id' => $ad->id]));
    }

    /**
     * @param Ad $ad
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Ad $ad)
    {
        if (Auth::id() === $ad->user_id) {
            $ad->delete();
        }
        return redirect('home');
    }
}
