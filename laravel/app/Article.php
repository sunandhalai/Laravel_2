<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * {@inheritDoc}
 */
class Article extends Model {

	// add assignment
	protected $fillable = ['title', 'body', 'published_at', 'image'];

	/**
	 * set value => Carbon Object
	 */
	protected $dates = ['published_at'];



	/**
		setting name function
		set_________Attribute
	  */
	public function setPublishedAtAttribute($date) {
		$this->attributes['published_at'] = Carbon::parse($date)->subDay();
	}


	/*
	 * relationship one to many
	 * one user has many articles
	 */
	public function user() {
		return $this->belongsTo('App\User'); // namespace
	}

	/*
	 * Many to Many
	 * An article has many tags and a tag has many articles
	 */
	public function tags() {
		return $this->belongsToMany('App\tag')->withTimestamps(); // namespace
	}
	// many to many an edit
	public function getTagListAttribute(){
		return $this->tags->lists('id');
	}

	public function scopePublished($query) {
		$query->where('published_at', '<=', Carbon::now());
	}

	public function scopeUnPublished($query) {
		$query->where('published_at', '>', Carbon::now());
	}



}
