<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notifications;
use App\Models\notifications_khtc;
use App\Models\notifications_ttdn;
use App\Models\events;

class indexController extends Controller
{
    //

    public function index()
    {
    	# code...
    	$post = notifications::orderBy('id', 'desc')->paginate(12);
    	$events = events::orderBy('id', 'desc')->get();
    	$notifications_khtc = notifications_khtc::orderBy('id', 'desc')->get();
    	$notifications_ttdn = notifications_ttdn::orderBy('id', 'desc')->get();
    	return view('page.home')->with('post', $post)->with('events', $events)->with('notifications_khtc', $notifications_khtc)->with('notifications_ttdn', $notifications_ttdn);
    }


    public function resultSearch(Request $req)
    {
        # code...
        $news = notifications::orderBy('id', 'desc')->get();
        $resultSearch = notifications::where('title', 'like','%'.$req->txtSearch.'%')->orderBy('id', 'desc')->get();
        $resultSearchKhtc = notifications_khtc::where('title', 'like','%'.$req->txtSearch.'%')->orderBy('id', 'desc')->get();
        $resultSearchTtdn = notifications_ttdn::where('title', 'like','%'.$req->txtSearch.'%')->orderBy('id', 'desc')->get();

        return view('page.contentSearch')->with('news', $news)->with('resultSearch', $resultSearch)->with('resultSearchKhtc', $resultSearchKhtc)->with('resultSearchTtdn', $resultSearchTtdn)->with('txtSearch', $req->txtSearch);
    }
}