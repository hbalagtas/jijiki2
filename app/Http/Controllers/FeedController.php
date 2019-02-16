<?php

namespace Jijiki\Http\Controllers;

use Jijiki\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([   
            'name' => 'required',
            'feed' => 'required',
        ]);
        $data = [ 'user_id' => Auth::user()->id, 'name' => $request->name, 'feed' => $request->feed, 'blocklist' => $request->blocklist];
        Feed::create($data);

        return redirect()->back()->with('success', 'Feed created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Jijiki\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function show(Feed $feed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Jijiki\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function edit(Feed $feed)
    {
        return view('feeds.edit', compact('feed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Jijiki\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feed $feed)
    {
        $feed->update($request->all());
        return redirect('/')->with('status', 'Feed updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Jijiki\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feed $feed)
    {
        //
    }
}
