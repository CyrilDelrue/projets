<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Entre_priseController extends Controller
{
     public function entrepriseIndex() {
    	return view('entreprise/entre_prise');
    }
}
