<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {


	public function __construct() {
		$this->middleware('guest');
	}


	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index() {
		return view('welcome');
	}


}
