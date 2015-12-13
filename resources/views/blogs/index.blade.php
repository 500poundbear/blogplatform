@extends('main')
 
@section('content')
    All of the blogs
    
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