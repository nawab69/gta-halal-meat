<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class NewsLetterController extends Controller
{

    public function store(Request $request)
    {

        if ( ! Newsletter::isSubscribed($request->email) )
        {
            Newsletter::subscribePending($request->email);
            return back()->with('success', 'Thanks For Subscribe');
        }
        return back()->with('failure', 'Sorry! You have already subscribed ');
    }
}
