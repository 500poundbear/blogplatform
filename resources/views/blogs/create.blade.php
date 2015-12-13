@extends('main')
 
@section('content')
	
	
    <h3>Links</h3>
    <ul>
	    <li><a href="{{route('blogs.create')}}">Create</a></li>	
    </ul>
    <div class="form-group">
   	{!!Form::open(array('route'=>'blogs.create', 'method' => 'post')) !!} 
   			{!! Form::label('name', 'Title') !!} 
	   		{!! Form::text('title', Input::old('title'), array('class' => 'form-control')) !!}	   		
	   		{!! Form::label('name', 'Description') !!} 
	   		{!! Form::text('description', Input::old('description'), array('class' => 'form-control')) !!}    		
	   		
	   		{!! Form::label('name', 'Slug') !!} 
	   		{!! Form::text('slug', Input::old('slug'), array('class' => 'form-control'))!!}   		
	   		
	   		{!! Form::label('name', 'Type') !!} 
	   		{!! Form::select('type', array('public' => 'public', 'private'=>'private')) !!} 
	   		
	   		{!! Form::submit('Create new blog!', array('class'=>'btn btn-primary')) !!}  	
   	{!! Form::close()!!}
    </div>
@endsection