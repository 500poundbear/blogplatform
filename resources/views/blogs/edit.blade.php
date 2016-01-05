@extends('main')

@section('content')

<div class="large-8 columns">
  <br>
  <ul class="breadcrumbs">
    <li><a href="/blogs">Blogs</a></li>
    <li class="current">
      <a href="#">{{$blog->title}}</a>
      <a href="{{route('blogs.show', $blog->slug)}}">(Preview)</a>
    </li>
  </ul>

	<h2>Blog Dashboard</h2>


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

  	   		{!! Form::submit('Update!', array('class'=>'btn btn-primary button')) !!}
     	{!! Form::close()!!}
</div>
<div class="large-4 columns" style="border-left: 1px solid #eeeeee; margin-top:120px;">
  <h4>Blog Info
    <a style="font-size:15px" href="{{ route('blogs.edit', [$blog->slug])}}">(Edit)</a></h4><br>
  <table style="width:100%">
    <tbody>
      <tr>
        <td><b>Title</b></td>
        <td>{{$blog->title}}</td>
      </tr>
      <tr>
        <td><b>Description</b></td>
        <td>{{$blog->description}}</td>
      </tr>
      <tr>
        <td><b>Slug</b></td>
        <td>{{$blog->slug}}</td>
      </tr>
      <tr>
        <td><b>Owner ID</b></td>
        <td>{{$blog->owner}}</td>
      </tr>
    </tbody>
  </table>

  <br>
  <br>
  <br>
  <h4>Settings</h4>
</div>
@endsection
