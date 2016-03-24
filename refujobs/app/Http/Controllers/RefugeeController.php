<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RefugeeController extends Controller
{
    public function refugeeIndex() {
    	return view('refugee/levels');
    }
}
