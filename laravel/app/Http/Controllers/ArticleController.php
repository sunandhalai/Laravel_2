<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


class ArticleController extends Controller {


	public function __construct() {
		$this->middleware('auth', ['except' => ['index', 'show', 'create']]);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$articles = Article::get();

//		dd($article); // dump and die
		return view('articles.index', ['articles' => $articles]);
//		return $articles; // return json object
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return view('articles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	// onclick submit -> send data
	public function store() {

		Article::create(Request::all());

		return redirect('articles');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// articles/{id}
	public function show($id) {
		$articles = Article::find($id);

		if (empty($articles)) {
			abort(404);
		}

		return view('articles.show', ['articles' => $articles]);
//		return $articles;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
