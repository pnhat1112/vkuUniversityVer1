<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notifications;
use App\Models\notifications_khtc;
use App\Models\notifications_ttdn;
use DB;


class slugController extends Controller
{
    //

 public function getSingle($slug)
 {
   	# code...

  $post = notifications::where('slug', $slug)->first();
  $count = $post->viewCount;
  $data = notifications::where('slug', $slug)->update(['viewCount' => $count+1]);
  $news = notifications::orderBy('id', 'desc')->get();
  return view('notifications.single')->with('post', $post)->with('news', $news);
}

public function getSingleKhtc($slug)
{
    # code...
  $post = notifications_khtc::where('slug', $slug)->first();
  $count = $post->viewCount;
  $data = notifications_khtc::where('slug', $slug)->update(['viewCount' => $count+1]);
  $news = notifications_khtc::orderBy('id', 'desc')->get();
  return view('notifications.single')->with('post', $post)->with('news', $news);
}

public function getSingleTtdn($slug)
{
    # code... 
  $post = notifications_ttdn::where('slug', $slug)->first();
  $count = $post->viewCount;
  $data = notifications_ttdn::where('slug', $slug)->update(['viewCount' => $count+1]);
  $news = notifications_ttdn::orderBy('id', 'desc')->get();
  return view('notifications.single')->with('post', $post)->with('news', $news);
}

public function getAll(Request $req)
{
   	# code...
  $notificationsall = notifications::get();
  $notifications = notifications::orderBy('id', 'desc')->paginate(15);
  $news = notifications::orderBy('viewCount', 'desc')->limit(15)->get();
  $count = intval((count($notificationsall)/15) + 1);
    // echo $count;
  if ($req->ajax()) {
    $view = view('notifications.all', compact('notifications', 'news', 'count'))->render();
    return response()->json(['html' => $view]);
      # code...
  }
  return view('notifications.all', compact('notifications', 'news', 'count'));
}

}
