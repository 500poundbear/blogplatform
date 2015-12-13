@extends('main')
 
@section('content')
    <h3>Links</h3>
    <ul>
	    <li><a href="{{route('blogs.create')}}">Create</a></li>
		
    </ul>
    
    @if (!$blogs -> count()) 
    	You have no blog
    @else
    	<ul>
	    	@foreach ($blogs as $blog)
	    		<li><a href="{{route('blogs.show', $blog->slug)}}">{{ $blog->title }}</a></li>
	    	@endforeach
    	</ul>
    @endif
	    
	    
    
@endsection