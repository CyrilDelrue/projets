<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ChatController extends Controller
{
    public function forumIndex() {
    	return view('forum/chat');
    }
}
