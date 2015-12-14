@extends('main')
 
@section('content')
	
	
    <h3>Links</h3>
    <ul>
	    <li><a href="{{route('blogs.create')}}">Create</a></li>	
    </ul>
	<h2>Dashboard</h2>
	{{ $blog }}
	
	<h3>Posts</h3>
	<a href="{{ route('blogs.posts.create', [$blog->slug]) }}">New</a>
	@foreach ($posts as $post)
		<h4><a href="{{ route('blogs.posts.show', [$blog->slug, $post->slug])}}">{{$post['title']}}</a></h4>
		<p>{{$post['summary']}}</p>
		<p>{{$post['content']}}</p>
		<span>Created at {{$post['created_at']}}</span>
	@endforeach
	
	<h3>Comments</h3>
	
	<h3>Settings</h3>
@endsection