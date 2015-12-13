@extends('main')
 
@section('content')
    <h3>Links</h3>
    <ul>
	    <li><a href="{{route('blogs.create')}}">Create Blog</a></li>
		
    </ul>
    
    @if (!$blogs -> count()) 
    	You have no blog
    @else
    	<ul>
	    	@foreach ($blogs as $blog)
	    		<li><a href="{{route('blogs.show', $blog->slug)}}">{{ $blog->title }}</a></li>
	    		<li>
	    			<a href="{{route('blogs.manage', $blog->slug)}}">Dashboard[{{$blog->title}}]</a>
					<form action="{{ route('blogs.destroy', $blog->slug)}}" method="POST">
					    <input type="hidden" name="_method" value="DELETE">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <button>Delete User</button>
					</form>
									}}">Delete</a> 
	    		</li>
	    		
	    	@endforeach
    	</ul>
    @endif
	    
	    
    
@endsection