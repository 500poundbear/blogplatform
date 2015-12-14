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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($blog)
    {
        return view('posts.create', compact('blog'));
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
	    var_dump(Input::all());
	    $rules = array(
		    'title' => 'required',
		    'summary' => 'required|max:200',
		    'content' => '', 
		    'slug' => 'required|max:100',
	    );
	    
	    $validator = Validator::make(Input::all(), $rules);
	    
	    if ($validator->fails()){
		    return Redirect::to(route('blogs.posts.create'))
		    		->withErrors($validator)
		    		->withInput();
		    
	    } else {
		    $newpostdata = array(
			    'title' => Input::get('title'),
			    'summary' => Input::get('summary'),
			    'content' => Input::get('content'),
			    'slug' => Input::get('slug'),
			    'author_id' => Auth::user()['id']
		    );
			$newpostentry = Posts::create($newpostdata);
			$saved = $newpostentry->save();		
			
			if(!$saved) {
				NamBlog::abort(500, 'Error');
			} else {
				return Redirect::to(route('blogs.posts.index'));
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
        return view('posts.show', compact('blog','post','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
