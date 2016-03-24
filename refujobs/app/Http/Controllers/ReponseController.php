<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Quizz;
use App\Reponse;
use App\Question;
use Input;
use Redirect;
use Response;
use Auth;

class ReponseController extends Controller
{
	public function reponseNew() {
		$quizzs = Quizz::all();
		$questions = Question::all();

		return view('reponse/new', compact('quizzs', 'questions'));
	}

	public function reponseCreate(Request $request) {
		$input = $request->all();
	
    	$reponse = Reponse::create();
    	$reponse->reponse = $input['reponse'];
    	$reponse->question_id = $input['question_id'];
    	$reponse->save();

    	return redirect('admin/quizz');
	}
}
