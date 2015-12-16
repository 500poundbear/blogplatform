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

use NamBlog\Blogs;
use NamBlog\Posts;

class BlogsController extends Controller
{
	/* Initialise middleware usage */
    public function __construct()
    {
        $this->middleware('csrf');
        $this->middleware('auth');
    }
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    private function getuserinfo() {
	    
	    return Auth::user();
    }
    public function index()
    {
	    $blogs = Blogs::all();
	    //var_dump(Session::all());
	    $user = $this->getuserinfo();
	    return view('blogs.index', compact('blogs', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $user = $this->getuserinfo();
	    
        return view('blogs.create', compact('user'));
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
		    'description' => 'required|max:200',
		    'slug' => 'required|max:100',
		    'type' => 'required|in:public,private'
	    );
	    
	    $validator = Validator::make(Input::all(), $rules);
	    
	    if ($validator->fails()){
		    return Redirect::to('/blogs/create')
		    		->withErrors($validator)
		    		->withInput();
		    
	    } else {
		    $newblogdata = array(
			    'title' => Input::get('title'),
			    'description' => Input::get('description'),
			    'slug' => Input::get('slug'), 
			    'type' => Input::get('type'),
			    'owner' => Auth::user()['id']
		    );
			$newblogentry = Blogs::create($newblogdata);
			$saved = $newblogentry->save();		
			
			if(!$saved) {
				NamBlog::abort(500, 'Error');
			} else {
				return Redirect::to(route('blogs.index'));
			}    
	    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blogs $blog)
    {
	    $posts = $blog->posts()->get();
	    #$posts = Blogs::findOrFail($blog)->posts();
        return view('blogs.show', compact('blog', 'posts'));
    }
    
    /**
     * Manage the specific resource. More like dashboard
     */
    public function manage(Blogs $blog)
    {
	    $posts = $blog->posts()->get();
	    $comments = array();
	    foreach($posts as $post) {
		    foreach($post->comment()->get() as $comment) {
			    $comments[] = $comment;
		    }
	    }
	   	return view('blogs.manage', compact('blog','posts','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blogs $blog)
    {
	    
	    
	    
	    return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Blogs $blog)
    {
	    $rules = array(
		    'title' => 'required',
		    'description' => 'required|max:200',
		    'slug' => 'required|max:100',
		    'type' => 'required|in:public,private'
	    );
	    
	    $validator = Validator::make(Input::all(), $rules);
	    
	    if ($validator->fails()){
		    return Redirect::to('/blogs/create')
		    		->withErrors($validator)
		    		->withInput();
		    
	    } else {
		    $updatedblogdata = array(
			    'title' => Input::get('title'),
			    'description' => Input::get('description'),
			    'slug' => Input::get('slug'), 
			    'type' => Input::get('type'),
			    'owner' => Auth::user()['id']
		    );
			
			$updatedblog = Blogs::where('id', $blog['id'])->update($updatedblogdata);	
			
			
			if(!$updatedblog) {
				NamBlog::abort(500, 'Error');
			} else {
				return Redirect::to(route('blogs.manage', [$blog->slug]));
			}    
	    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blogs $blog)
    {
	    
        $todelete = Blogs::findOrFail($blog['id']);
        $todelete->delete();
        
        return Redirect::to(route('blogs.index'));
    }
}
