@extends('main')
 
@section('content')
	<a href="{{route('blogs.manage', [$blog->slug])}}">Back</a>
	
	<form action="{{ route('blogs.posts.destroy', [$blog->slug, $post->slug])}}" method="POST">
					    <input type="hidden" name="_method" value="DELETE">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <button>Delete Post</button>
					</form>

	<h3>Post editor here</h3>
	
	{!!Form::model($post, ['route' => ['blogs.posts.update', $blog->slug, $post->slug], 'method' => 'put']) !!} 
   			{!! Form::label('name', 'Title') !!} 
	   		{!! Form::text('title', Input::old('title'), array('class' => 'form-control')) !!}	   		
	   		<br>
	   		{!! Form::label('name', 'Summary') !!} 
	   		{!! Form::textarea('summary', Input::old('summary'), array('class' => 'form-control')) !!}    			<br>
	   		{!! Form::label('name', 'Content') !!} 
	   		{!! Form::textarea('content', Input::old('content'), array('class' => 'form-control')) !!}    			<br>
	   		{!! Form::label('name', 'Slug') !!} 
	   		{!! Form::text('slug', Input::old('slug'), array('class' => 'form-control'))!!}   		
	   		<br>
	   		{!! Form::hidden('postid', $post['id'])!!}
	   		
	   		
	   		{!! Form::submit('Update!', array('class'=>'btn btn-primary')) !!}  	
   	{!! Form::close()!!}
	
	

	
	<h3>Comments</h3>
	@foreach ($comments as $comment)
	    		<li>{{$comment->name}} </li>
	    		</form>
		</li>		
	@endforeach


@endsection