<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;
use Request;

use App\Tag;
//use Illuminate\Http\Request;


class ArticleController extends Controller {


	public function __construct() {
		/**
		 * middleware คือ จะอนุญติให้เข้าใช้งานได้ โดย ไม่ต้องเข้าระบบ login
		 * only : จำกัดสิทธิ์การเข้าถึงเฉพาะ function ที่กำหนด
		 * except : จำกัดสิทธิ์การเข้าถึงทั้งหมด ยกเว้น function ที่กำหนด
		 */
		$this->middleware('auth', ['except' => ['index', 'show']]);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$articles = Article::get();
//		$articles = Article::Published()->get();  // อดีต
//		$articles = Article::unPublished()->get();  // อนาคต

//		dd($article); // dump and die
		return view('articles.index', compact('articles'));

//		return $articles; // return json object

		// test class Auth
//		return Auth::user()->id;

//		session()->flash('flash_message', 'Edit completed');
//		return session('flash_message');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		// add many to many
		$tag_list = Tag::lists('name', 'id');

		return view('articles.create', compact('tag_list'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	// onclick submit -> send data
	public function store(ArticleRequest $request) {

		// Request use
//		$input = Request::all();

		// check data input :: use ArticleRequest class
//		$input = $request->all();
//		Article::create($input);


		$article = new Article($request->all());

		// add image
		if ($request->hasFile('image')) {
			$image_filename = $request->file('image')->getClientOriginalName();
			$image_name = date("Ymd-His-").$image_filename;
			$public_path = 'images/articles/';
			$destination = base_path() . $public_path;
			$request->file('image')->move($destination, $image_name);
			$article->image = $public_path . $image_name;
		}

		// add migration user_id
		/* form 1 */
		$article->user_id = Auth::user()->id;
		$article->save();
		/* form 2 */
//		Auth::user()->articles()->save($article);

		// add many to many
		$tagsId = $request->input('tag_list');
		if(!empty($tagsId))
			$article->tags()->sync($tagsId);

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
		$article = Article::find($id);

		if (empty($article)) {
			abort(404);
		}

		return view('articles.show', compact('article'));
//		return compact('articles');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		$article = Article::find($id);
		if (empty($article)) {
			abort(404);
		}
		// show tag_list
		$tag_list = Tag::lists('name', 'id');

		return view('articles.edit', compact('article', 'tag_list'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, ArticleRequest $request) {
		$article = Article::findOrFail($id);
		$article->update($request->all());

		// update image
		if ($request->hasFile('image')) {
			$image_filename = $request->file('image')->getClientOriginalName();
			$image_name = date("Ymd-His-").$image_filename;
			$public_path = 'images/articles/';
			$destination = base_path() . $public_path;
			$request->file('image')->move($destination, $image_name);
			$article->image = $public_path . $image_name;
			$article->save();
		}

		$tagsId = $request->input('tag_list');
		if(!empty($tagsId))
			/* select */
			$article->tags()->sync($tagsId);
		else
			/* Not select */
			$article->tags()->detach();

		session()->flash('flash_message', 'Edit completed');
		return redirect('articles');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$article = Article::findOrFail($id);
		$article->delete();
		return redirect('articles');
	}

}
