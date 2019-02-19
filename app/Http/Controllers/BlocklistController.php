<?php

namespace Jijiki\Http\Controllers;

use Jijiki\Blocklist;
use Illuminate\Http\Request;

class BlocklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        return view('blocklists.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$keyword = Blocklist::whereKeyword($request->keyword)->first();
    	if ( is_null($keyword) ){
    		Blocklist::create($request->all());	
    		return redirect()->back()->with('status', 'Keyword created successfully');
    	} else {
    		return redirect()->back()->with('error', 'Keyword is already in blocklist');
    	}
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \Jijiki\Blocklist  $blocklist
     * @return \Illuminate\Http\Response
     */
    public function show(Blocklist $blocklist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Jijiki\Blocklist  $blocklist
     * @return \Illuminate\Http\Response
     */
    public function edit(Blocklist $blocklist)
    {
        return view('blocklists.edit', compact('blocklist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Jijiki\Blocklist  $blocklist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blocklist $blocklist)
    {
        $blocklist->update($request->all());
        return redirect()->route('blocklist.index')->with('status', 'Keyword updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Jijiki\Blocklist  $blocklist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blocklist $blocklist)
    {
        $blocklist->delete();
        return redirect()->route('blocklist.index')
                        ->with('status','Keyword deleted successfully');
    }
}
