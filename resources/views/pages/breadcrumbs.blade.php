<ul class="list-inline">
	<li><a href="{{url('/')}}">Home</a></li> >>
	@foreach (breakPath($page->path, $page->title_path) as $path)
	<li>
		<a href="{{$path['url']}}">{{$path['title']}}</a> >>
	</li>
	@endforeach
</ul>