<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Cookie;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function getAbout() {
		/* localhost/laravel/pages/about */


		/* set session */
		session(['key1' => 'session value']);

		/* set cookie */
		/**
		 * use Cookie;
		 *
		 * set an item in cookie
		 * Cookie::queue('cookie_name', $value, $minute);
		 *
		 * set an item in cookie forever (5 years)
		 * Cookie::queue(Cookie::forever('cookie_name', $value));
		 */
		Cookie::queue('cookie_name', 'cookie value', 1);


		$first 	= 'Taylor';
		$last	= 'Osborn';
		$skills = ['PHP', 'HTML', 'CSS', 'JavaScript', 'CakePHP'];
		/* วิธีที่ 1*/
		return view('pages.about')->withFirst($first)->withLast($last)->withSkills($skills);
		/* or วิธีที่ 2 */
//		return view('pages.about')->with(['first' => $first, 'last' => $last, 'skills' => $skills]);
	}

	public function getContactUs() {
		/* get an item in session */
//		$session = session('key1');

		/* get an item in Cookie */
		$cookie = Cookie::get('cookie_name');

		return $cookie;
	}
}
