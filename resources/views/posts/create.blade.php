@extends('main')

@section('content')
  <script src="{{$url = asset('/EpicEditor-v0.2.2/js/epiceditor.js')}}" type="text/javascript"></script>

	<h3>Add new post here</h3>
	You are adding to {{$blog['title']}} blog.

  
	{!!Form::open(array('route'=>array('blogs.posts.store', $blog['slug']), 'method' => 'post')) !!}
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
	   		{!! Form::hidden('blogid', $blog['id'])!!}


	   		{!! Form::submit('Post!', array('class'=>'btn btn-primary')) !!}
   	{!! Form::close()!!}





@endsection
