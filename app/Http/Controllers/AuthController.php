<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Auth;
use App\Models\LoginToken;

class AuthController extends Controller
{
	/**
	 * Show login page
	 */
    public function showLogin()
	{
		return view('auth.login');
	}

	/**
	 * @param  Request
	 * Login user with request
	 */
	public function login(Request $request)
	{
		$data = $request->validate([
			'email' => ['required', 'email', 'exists:users,email'],
		]);
		User::whereEmail($data['email'])->first()->sendLoginLink();
		session()->flash('success', true);
		return redirect()->back();
	}

	/**
	 * [Allow new user to login without email verification in database]
	 * @param  Request $request [description]
	 */
	public function publicLogin(Request $request)
	{
		$data = $request->validate([
			'email' => ['required', 'email'],
		]);
		$user = User::firstOrCreate(['email'=>$data['email']],['name'=>$data['email']])->sendLoginLink();
		session()->flash('success', true);
		return redirect()->back();
	}

	/**
	 * @param  Request
	 * @param  [$token]
	 * Verify user login
	 */
	public function verifyLogin(Request $request, $token)
	{
		$token = LoginToken::whereToken(hash('sha256', $token))->firstOrFail();
		abort_unless($request->hasValidSignature() && $token->isValid(), 401);
		$token->consume();
		Auth::login($token->user);
		return redirect('/');
	}

	/**
	 * Logout user
	 */
	public function logout()
	{
		Auth::logout();
		return redirect(route('login'));
	}
}
