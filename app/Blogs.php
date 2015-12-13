<?php

namespace NamBlog;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
	public function posts()
	{
		return $this->hasMany('NamBlog\Posts', 'blog_id');
	}
}
