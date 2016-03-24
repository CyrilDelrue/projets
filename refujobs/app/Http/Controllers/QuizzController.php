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

class QuizzController extends Controller
{
    public function quizzIndex() {
    	$quizzs = Quizz::all();
        $questions = Question::all();
        
    	return view('quizz/index', compact('quizzs', 'questions'));
    }

    public function quizzNew() {
    	return view('quizz/new');
    }

    public function quizzCreate(Request $request) {
    	$input = $request->all();

    	$quizz = Quizz::create();
    	$quizz->name = $input['name'];
    	$quizz->save();

    	return redirect('admin/question/new');
    }
}
