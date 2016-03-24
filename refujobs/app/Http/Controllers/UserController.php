<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Input;
use Redirect;
use Response;
use Auth;

class UserController extends Controller
{
	public function userShow($id) {
		$users = User::find($id);

		return view('user_admin/show', ['user' => User::findOrFail($id)], compact('user'));
	}

	public function userEdit($id) {
		$users = User::find($id);

		return view('user_admin/edit', ['user' => User::findOrFail($id)], compact('user'));
	}

	public function userUpdate(Request $request) {
		$input = $request->all();
		$update = User::find($input['id']);

		if($input['firstname'] != NULL) {
			$this->firstNameUpdate($input['firstname'], $update);
		}
		if($input['name'] != NULL) {
			$this->nameUpdate($input['name'], $update);
		}
		if($input['login'] != NULL) {
			$this->loginUpdate($input['login'], $update);
		}
		if($input['phone'] != NULL) {
			$this->phoneUpdate($input['phone'], $update);
		}
		if($input['email'] != NULL) {
			$this->emailUpdate($input['email'], $update);
		}
		if($input['password'] != NULL &&  $input['password'] == $input['comfirm']) {
			$this->passwordUpdate($input['password'], $update);
		}
		return redirect('admin');
	}

	public function firstNameUpdate($firstname, $user) {
		$id = $user->id;

		$update = User::find($id);
		$update->firstname = $firstname;
		$update->save();
	}

	public function nameUpdate($name, $user) {
		$id = $user->id;

		$update = User::find($id);
		$update->name = $name;
		$update->save();
	}

	public function loginUpdate($login, $user) {
		$id = $user->id;

		$update = User::find($id);
		$update->login = $login;
		$update->save();
	}

	public function phoneUpdate($phone, $user) {
		$id = $user->id;

		$update = User::find($id);
		$update->phone = $phone;
		$update->save();
	}

	public function emailUpdate($email, $user) {
		$id = $user->id;

		$update = User::find($id);
		$update->email = $email;
		$update->save();
	}

	public function passwordUpdate($password, $user) {
		$id = $user->id;

		$update = User::find($id);
		$update->password = $password;
		$update->save();
	}

	public function userDestroy($id) {
		$user = User::find($id);

		$user->delete();
		return redirect('admin');
	}
}
