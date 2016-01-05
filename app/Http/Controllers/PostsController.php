<?php

namespace NamBlog\Http\Controllers;

use Auth;
use Session;
use Input;
use Routes;
use Validator;
use Redirect;

use Illuminate\Http\Request;

use NamBlog\Http\Requests;
use NamBlog\Http\Controllers\Controller;

use NamBlog\Posts;
use NamBlog\Blogs;

class PostsController extends Controller
{
	/* Initialise middleware usage */
    public function __construct()
    {
        $this->middleware('csrf');
        $this->middleware('auth');
    }
    /* returns Auth::user() */
    private function getuserinfo() {
      return Auth::user();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($blog)
    {
      $user = $this->getuserinfo();

      return view('posts.create', compact('blog','user'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
	    //Use Input::get(<inputname>) to get value
	    $rules = array(
		    'title' => 'required',
		    'summary' => 'required|max:200',
		    'content' => 'required',
		    'slug' => 'required|max:100',
		    'blogid' => 'required'
	    );

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails()){
		    echo "SDSDFSDF";
		    var_dump($validator->messages());
		    var_dump($validator);
		    /*return Redirect::to(route('blogs.posts.create'))
		    		->withErrors($validator)
		    		->withInput();
		    */
	    } else {
		    $newpostdata = array(
			    'title' => Input::get('title'),
			    'summary' => Input::get('summary'),
			    'content' => Input::get('content'),
			    'slug' => Input::get('slug'),
			    'blog_id' => Input::get('blogid'),
			    'author_id' => Auth::user()['id']
		    );
			$newpostentry = Posts::create($newpostdata);
			$saved = $newpostentry->save();

			if(!$saved) {
				NamBlog::abort(500, 'Error');
			} else {
				$currblog = Blogs::where('id', $newpostdata['blog_id'])->first();
				return Redirect::to(route('blogs.show', $currblog['slug']));
			}
	    }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blogs $blog, Posts $post)
    {
	    $comments = $post->comment()->get();

      $user = $this->getuserinfo();
        return view('posts.show', compact('blog','post','comments','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Blogs $blog, Posts $post)
    {
	    $rules = array(
		    'title' => 'required',
		    'summary' => 'required|max:200',
		    'content' => 'required',
		    'slug' => 'required|max:100',
		    'postid' => 'required'
	    );

	    $validator = Validator::make(Input::all(), $rules);

	    if ($validator->fails()){
		    echo "SDSDFSDF";
		    var_dump($validator->messages());
		    var_dump($validator);
		    /*return Redirect::to(route('blogs.posts.create'))
		    		->withErrors($validator)
		    		->withInput();
		    */
	    } else {
		    $updatedpostdata = array(
			    'title' => Input::get('title'),
			    'summary' => Input::get('summary'),
			    'content' => Input::get('content'),
			    'slug' => Input::get('slug'),
			    'author_id' => Auth::user()['id']
		    );

		    /* TODO: Check if user is authorised to edit post */

			$updatedpost = Posts::where('id', Input::get('postid'))->update($updatedpostdata);
			return Redirect::to(route('blogs.posts.show', [$blog['slug'], $updatedpostdata['slug']]));
	    }
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blogs $blog, Posts $post)
    {
        $todelete = Posts::findOrFail($post['id']);
        $todelete->delete();

        return Redirect::to(route('blogs.manage', $blog['slug']));

    }
}
