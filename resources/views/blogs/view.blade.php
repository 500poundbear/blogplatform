@extends('blog')
@section('title', $blog['title'])

@section('sidebar')
  @parent
@stop

@section('content')
<script>
  $(document).ready(function() {
        var vidIds = ['BfM_PJDk0r8', '93CZ6oFR8Q0', 'UcUERyHeNSY', 'y_O7hRuhoP0', 'AVprz0nm0Y4'];
        var options = {videoId: vidIds[Math.floor(Math.random()*vidIds.length)], mute: false};
        $('.woop').tubular(options); // where idOfYourVideo is the YouTube ID.

        $('#mute').click(function() {
            alert("W");
            $('.woop').tubular({ mute:true });
        });
    });
</script>
	<h3><a href="{{route('blogs.show', [$blog->slug])}}">{{$blog['title']}}</a></h3>

	<h3>{{$post['title']}}</h3>
	<p>{{$post['content']}}</p>
	<span>{{$post['created_at']}}</span>


          <div style="text-align:center; margin-top:100px;">
          <span>Video controls:
          <a href="#" class="tubular-play">Play</a> |
          <a href="#" class="tubular-pause">Pause</a> |
          <a href="#" class="tubular-mute">Mute</a>
          </span>
          </div>

@endsection
