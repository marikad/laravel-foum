<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Favorite;
use App\Thread;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
	public function __construct() 
	{
		$this->middleware('auth');
	}
    public function store(Reply $reply)
    {
         $reply->favorite();

         return back();
    }

//     public function loginRedirect(Reply $replies)
// {

// $thread = Thread::where('id', $replies->thread_id)->get();

// return redirect('threads/'.$thread[0]->channel->name.'/'.$thread[0]->id);

// }
}
