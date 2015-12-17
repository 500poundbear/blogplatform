@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('flash_notification.message'))
    <div class="alert alert-{{ Session::get('flash_notification.level') }}" style="background:pink;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        {{ Session::get('flash_notification.message') }}
    </div>
@endif

<a href="{{route('blogs.manage', $blog->slug)}}">Back</a>

{!!Form::model($comment, ['route' => ['comment.update', $blog->slug, $comment->id], 'method' => 'put']) !!} 
   			{!! Form::label('name', 'Name') !!} 
	   		{!! Form::text('name', Input::old('name'), array('class' => 'form-control')) !!}	   		
	   		<br>
	   		{!! Form::label('name', 'Email') !!} 
	   		{!! Form::text('email', Input::old('email'), array('class' => 'form-control')) !!}    			
	   		<br>
	   		{!! Form::label('name', 'Message') !!} 
	   		{!! Form::textarea('message', Input::old('message'), array('class' => 'form-control')) !!} 
	   		
	   		{!! Form::hidden('comment_id', $comment['id']) !!}
	   			
	   		{!! Form::submit('Update!', array('class'=>'btn btn-primary')) !!}  	
   	{!! Form::close()!!}