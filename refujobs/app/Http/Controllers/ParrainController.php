<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ParrainController extends Controller
{
    public function parrainIndex() {
    	return view('parrain/mentor');
    }
}
