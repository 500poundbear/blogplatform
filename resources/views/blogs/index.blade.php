@extends('main')


@section('content')
<script>
	$(document).ready(function () {
			$('#deleteblog').click(function() {
					confirm("Sure to delete?");
			});
	});
</script>
<div class="large-8 columns">

    <h3>Links</h3>

    @if (!$blogs -> count())
    	You have no blog
    @else
		  	@foreach ($blogs as $blog)
				<div class="panel callout radius">
					<div style="float:right;">
						<form action="{{ route('blogs.destroy', $blog->slug)}}" method="POST">
					    <input type="hidden" name="_method" value="DELETE">
					    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					    <button type="submit" id="deleteblog" class="alert button">Delete Blog</button>
						</form>
					</div>
					<h5>{{ $blog->title }}</h5>
	    		<p>{{$blog->description}}</p>
					<a href="{{route('blogs.show', $blog->slug)}}">Preview</a>
	    		<a href="{{route('blogs.manage', $blog->slug)}}">Dashboard</a>

				</div>
	    	@endforeach
    	</ul>

    @endif
</div>
<div class="large-4 columns">

</div>
@endsection
