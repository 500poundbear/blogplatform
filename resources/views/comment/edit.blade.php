{!!Form::model($comment, ['route' => ['comment.update', $blog->slug, $comment->id], 'method' => 'put']) !!} 
   			{!! Form::label('name', 'Name') !!} 
	   		{!! Form::text('name', Input::old('name'), array('class' => 'form-control')) !!}	   		
	   		<br>
	   		{!! Form::label('name', 'Email') !!} 
	   		{!! Form::text('email', Input::old('email'), array('class' => 'form-control')) !!}    			
	   		<br>
	   		{!! Form::label('name', 'Message') !!} 
	   		{!! Form::textarea('message', Input::old('message'), array('class' => 'form-control')) !!}    			
	   			
	   		{!! Form::submit('Update!', array('class'=>'btn btn-primary')) !!}  	
   	{!! Form::close()!!}