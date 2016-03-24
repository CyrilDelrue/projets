<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Quizz;
use App\Question;
use Input;
use Redirect;
use Response;
use Auth;

class QuestionController extends Controller
{
	public function questionNew() {  
		$quizzs = Quizz::all();

		return view('question/new', compact('quizzs'));
	}

	public function questionCreate(Request $request) {
		$input = $request->all();

		$question = Question::create();
		$question->question = $input['question'];
		$question->default = $input['default'];
		$question->quizz_id = $input['quizz_id'];
		$question->save();

		return redirect('admin/quizz');
	}

	public function questionShow($id) {
		$questions = Question::all();

		return view('question/show', compact('questions'));
	}

	public function questionEdit($id) {
		$questions = Question::all();
		$test = null;
		foreach($questions as $key => $question) {
			if($question->quizz_id == $id) {
				$test = $question;
			}
		}

		return view('question/edit', $question->id, compact($test));
	}
}
