@extends('blog')
@section('title', $blog['title'])

@section('sidebar')
  @parent
@stop

@section('content')
<div class="large-12 columns">
  <h1>Dashboard</h1>
  <h1>{{$blog['title']}}</h1>

	@foreach ($posts as $post)
		<h3><a href="{{route('blogs.posts.view',[$blog->slug, $post->slug])}}">{{$post['title']}}</a></h3>
		<p>{{$post['summary']}}</p>
		<span>{{$post['created_at']}}</span>
	@endforeach
</div>


@endsection
