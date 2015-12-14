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
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function manage(Blogs $blog)
    {
	    $posts = $blog->posts()->get();
	   	return view('blogs.manage', compact('blog','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
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
    public function update(Blog $blog)
    {
        //
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
