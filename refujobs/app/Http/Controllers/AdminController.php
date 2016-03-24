<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Quizz;
use App\Reponse;
use App\User;

class AdminController extends Controller
{
    public function adminIndex() {
	// $quizzs = Quizz::find(1)->reponses;
	$users = User::all();
	// var_dump($quizzs);
    	return view('admin/index', compact('quizzs', 'users'));
    }
}
