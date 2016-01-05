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

	@if (Session::has('flash_notification.error'))
    <div class="alert alert-{{ Session::get('flash_notification.level') }}" style="background:pink;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        {{ Session::get('flash_notification.error') }}
    </div>
@endif

@if (Session::has('flash_notification.message'))
    <div class="alert alert-{{ Session::get('flash_notification.level') }}" style="background:pink;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

        {{ Session::get('flash_notification.message') }}
    </div>
@endif

	<h2>Blog Dashboard</h2>

	<h3>Posts <a href="{{ route('blogs.posts.create', [$blog->slug]) }}"><button class="button success">+</button></a></h3>
	@foreach ($posts as $post)
  <div style="margin-bottom:40px">
		<h4><a href="{{ route('blogs.posts.show', [$blog->slug, $post->slug])}}">{{$post['title']}}</a></h4>
		<p>{{$post['summary']}}</p>
		<p>{{$post['content']}}</p>
		<span>Created at {{$post['created_at']}}</span>
  </div>
	@endforeach

	<h3>Comments</h3>
	@foreach ($comments as $comment)
    <div style="display:block; height:150px;border: 1px solid #EEEEEE; padding: 10px;">
	    <h6><b>{{$comment->name}}</b> : {{$comment->message}}</h6>

      <span>{{$comment->updated_at}}</span>
      <div style="float:right; height:150px;">
  	    <a href="{{route('comment.edit', [$blog->slug, $comment->id])}}">
          <button class="button secondary">
            Edit
          </button>
        </a>
        <form action="{{ route('comment.destroy', [$blog->slug, $comment->id])}}" method="POST">
    			<input type="hidden" name="_method" value="DELETE">
    			<input type="hidden" name="_token" value="{{ csrf_token() }}">
    			<button class="button alert">Delete</button>
    		</form>
      </div>
  </div>
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
