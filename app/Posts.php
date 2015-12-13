<?php

namespace NamBlog;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
	public function blog()
	{
		return $this->belongsTo('NamBlog\Blogs');
	}
}
