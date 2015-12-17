@extends('main')
 
@section('content')
	The blog, <b>{{$blog['title']}}</b> should be rendered here. 
    
    
    <h3>Posts</h3>
	
	@foreach ($posts as $post)
		<h4><a href="{{route('blogs.posts.view',[$blog->slug, $post->slug])}}">{{$post['title']}}</a></h4>
		<p>{{$post['summary']}}</p>
		<p>{{$post['content']}}</p>
		<span>Created at {{$post['created_at']}}</span>
	@endforeach

@endsection