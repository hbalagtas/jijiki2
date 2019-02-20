<?php

namespace Jijiki\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jijiki\EmailLog;

class EmailLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emaillogs = EmailLog::whereTo(Auth::user()->email)->get();
        return view('emaillogs.index', compact('emaillogs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Jijiki\EmailLog  $emaillog
     * @return \Illuminate\Http\Response
     */
    public function show(EmailLog $emaillog)
    {
        return view('emaillogs.show', compact('emaillog'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Jijiki\EmailLog  $emaillog
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmailLog $emaillog)
    {
        $emaillog->delete();
        return redirect()->route('emaillog.index')
                        ->with('status','Email log deleted successfully');
    }
}
