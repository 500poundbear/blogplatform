@extends('main')
 
@section('title', 'Page Title')
 
@section('content')
	
	<a href="{{route('blogs.show', [$blog->slug])}}">Back</a>
	
	<h4><a href="{{route('blogs.posts.view',[$blog->slug, $post->slug])}}">{{$post['title']}}</a></h4>
	<p>{{$post['summary']}}</p>
	<span>Created at {{$post['created_at']}}</span>
	
@endsection