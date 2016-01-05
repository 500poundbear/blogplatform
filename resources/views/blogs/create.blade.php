@extends('main')

@section('content')
@if (count($errors) > 0)
		<div class="alert alert-danger">
			<div data-alert class="alert-box alert round">
				<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
				</ul>
			</div>
		</div>
@endif

@if (Session::has('flash_notification.message'))
		<div class="alert alert-{{ Session::get('flash_notification.level') }}" style="background:pink;">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

				{{ Session::get('flash_notification.message') }}
		</div>
@endif
	<h4>New Blog</h4>
    <div class="form-group">
   	{!!Form::open(array('route'=>'blogs.store', 'method' => 'post')) !!}
   			{!! Form::label('name', 'Title') !!}
	   		{!! Form::text('title', Input::old('title'), array('class' => 'form-control')) !!}
	   		{!! Form::label('name', 'Description') !!}
	   		{!! Form::text('description', Input::old('description'), array('class' => 'form-control')) !!}

	   		{!! Form::label('name', 'Slug') !!}
	   		{!! Form::text('slug', Input::old('slug'), array('class' => 'form-control'))!!}

	   		{!! Form::label('name', 'Type') !!}
	   		{!! Form::select('type', array('public' => 'public', 'private'=>'private')) !!}

	   		{!! Form::submit('Create new blog!', array('class'=>'btn btn-primary button')) !!}
   	{!! Form::close()!!}
    </div>
@endsection
