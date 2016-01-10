<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	//
	protected $fillable = ['name'];

	/*
	 * Many to Many
	 * An article has many tags and a tag has many articles
	 */
	public function articles() {
		return $this->belongsToMany('App\Article'); // namespace
	}

}
