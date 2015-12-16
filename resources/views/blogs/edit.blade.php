{!!Form::model($blog, ['route' => ['blogs.update', $blog->slug], 'method' => 'put']) !!} 
   			{!! Form::label('name', 'Title') !!} 
	   		{!! Form::text('title', Input::old('title'), array('class' => 'form-control')) !!}	   		
	   		<br>
	   		{!! Form::label('name', 'Description') !!} 
	   		{!! Form::textarea('description', Input::old('description'), array('class' => 'form-control')) !!}    			<br>
	   		{!! Form::label('name', 'Slug') !!} 
	   		{!! Form::text('slug', Input::old('slug'), array('class' => 'form-control')) !!}    			<br>
	   		{!! Form::label('name', 'type') !!} 
	   		{!! Form::text('type', Input::old('type'), array('class' => 'form-control'))!!}   		
	   			   		
	   		{!! Form::submit('Update!', array('class'=>'btn btn-primary')) !!}  	
   	{!! Form::close()!!}