@extends('main')
 
@section('content')
	
	
    <h3>Links</h3>
    <ul>
	    <li><a href="{{route('blogs.create')}}">Create</a></li>	
    </ul>
	<h3>Blog Info</h3>
	{{ $blog }}
	
	<h3>Posts</h3>
	asdf
@endsection