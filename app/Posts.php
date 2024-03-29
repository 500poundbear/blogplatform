<?php

namespace NamBlog;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
	public function blog()
	{
		return $this->belongsTo('NamBlog\Blogs');
	}
	public function author()
	{
		return $this->belongsTo('NamBlog\User');
	}
	public function comment()
	{
		return $this->hasMany('NamBlog\Comment', 'post_id');
	}
	
	protected $fillable = array('title', 'summary','content', 'slug', 'blog_id', 'author_id');
}
