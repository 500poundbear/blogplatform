<?php

namespace NamBlog\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
use Input;
use Routes;
use Validator;
use Redirect;
use Flash;

use NamBlog\Http\Requests;
use NamBlog\Http\Controllers\Controller;

use NamBlog\Comment;
use NamBlog\Posts;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    /**
     * Manages all comments from one place
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
	    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($blog, $comment)
    {
        return view('comment.edit', compact('blog', 'comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    private function checkpostandusertally($comment_id) {
	    /* Remember, returning true means error present */
		return Comment::where('id',$comment_id)->first()->post()->first()->author_id !== Auth::user()['id'];
	}  
     
    public function update($blog, $comment)
    {
	    $rules = array(
		    'name' => 'required',
		    'email' => 'required|email',
		    'message' => 'required', 
		    'comment_id' => 'required|int'
	    );
	    
	    $validator = Validator::make(Input::all(), $rules);
	    
	    $validator->after(function($validator) {
		    if ($this->checkpostandusertally(Input::get('comment_id'))) {
		        $validator->errors()->add('field', 'Something is wrong with this field!');
		    }
		});
	    
	 	if ($validator->fails()){
		    return Redirect::to(route('comment.edit', [$blog->slug, $post->slug, $comment->id]))
		    		->withErrors($validator)
		    		->withInput();
		    
	    } else {
		    $updatedcommentdata = array(
			    'name' => Input::get('name'),
			    'email' => Input::get('email'),
			    'message' => Input::get('message')
		    );
		    
			$updatedcomment = Comment::where('id', Input::get('comment_id'))->update($updatedcommentdata);	
			if (!$updatedcomment) {
				return NamBlog::abort(500, 'Error');
			} else {
				Flash::message("Comment (id: ".Input::get('comment_id').") has been updated!");
				return Redirect::to(route('comment.edit', [$blog->slug, $comment->id]));    		    
			}
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * 
     */
    public function destroy($blog, $comment)
    {
		$rules = array(
			'comment_id' => 'required|int'	
		);
		$validator = Validator::make(['comment_id'=>$comment['id']], $rules);
	    
	    if ($validator->fails()) {
		    Flash::error("Deletion of comment (id: ".Input::get('comment_id').") has failed!");
		    return Redirect::to(route('blogs.manage', $blog['slug'])); 
	    } else {
			$todelete = Comment::findOrFail($comment['id']);
			$todelete->delete();
        
			Flash::message('Deletion of comment (id: '.Input::get('comment_id').") has succeeded!");
			return Redirect::to(route('blogs.manage', $blog['slug']));    
		}
	}
}
