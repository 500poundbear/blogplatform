@extends('main')
 
@section('content')

	<h3>Post editor here</h3>
	{{var_dump($post->id)}}
	<form action="{{ route('blogs.posts.destroy', [$blog->slug, $post->slug])}}" method="POST">
					    <input type="hidden" name="_method" value="DELETE">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <button>Delete Post</button>
					</form>

	{{$post}}
	{{$blog}}


	<a href="">Update</a>
	
	<h3>Comments</h3>
	
	{{$comments}}

@endsection