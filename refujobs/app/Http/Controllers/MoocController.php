<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MoocController extends Controller
{
    public function moocIndex() {
    	return view('mooc/mooc_test');
    }
}
