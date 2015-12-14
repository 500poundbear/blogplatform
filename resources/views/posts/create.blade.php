@extends('main')
 
@section('content')

	<h3>Add new post here</h3>
	You are adding to {{$blog['title']}} blog.

	{!!Form::open(array('route'=>'blogs.posts.store', 'method' => 'post')) !!} 
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
	   		TOWORKON{!! Form::hidden('blogid')!!}
	   		
	   		
	   		{!! Form::submit('Post!', array('class'=>'btn btn-primary')) !!}  	
   	{!! Form::close()!!}



	<a href="">Post</a>
	

@endsection