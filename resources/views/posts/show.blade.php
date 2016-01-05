@extends('main')

@section('content')

<div class="large-8 columns">
<br>
  <ul class="breadcrumbs">
    <li><a href="/blogs">Blogs</a></li>
    <li class="current">
      <a href="{{route('blogs.manage', [$blog->slug])}}">{{$blog->title}}</a>
      <a href="{{route('blogs.show', $blog->slug)}}">(Preview)</a>
    </li>
    <li class="unavailable">Edit Post</li>
  </ul>

  	<form action="{{ route('blogs.posts.destroy', [$blog->slug, $post->slug])}}" method="POST">
  					    <input type="hidden" name="_method" value="DELETE">
  					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  					    <button class="button alert">Delete Post</button>
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


  	   		{!! Form::submit('Update!', array('class'=>'btn btn-primary button success')) !!}
     	{!! Form::close()!!}




  	<h3>Comments</h3>
  	@foreach ($comments as $comment)
  	  <li>{{$comment->name}} </li>
  	@endforeach


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
