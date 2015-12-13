<?php

namespace NamBlog\Http\Controllers;
use Auth;
use Session;
use Routes;
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
    public function index()
    {
	    $blogs = Blogs::all();
	    var_dump(Auth::user());
	    var_dump(Session::all());
	        
	    return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(Blog $blog)
    {
        $todelete = Blog::findOrFail($blog);
        $todelete->delete();
        
        return Redirect::route('blogs.index');
    }
}
