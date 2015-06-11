<li>
	<label label-default="" class="{{ $page->hasSubPages()? 'tree-toggler nav-header' : ''}}">{{$page->title}}</label>
	<ul class="list-inline list-btns pull-right">
		<li><a href="{{--url($page->path)--}}" class="btn btn-xs btn-primary" target="_blank">view</a></li>
		<li><a href="{{url('admin/pages/'.$page->slug.'/edit')}}" class="btn btn-xs btn-primary">edit</a></li>
		<li>
			{!! Form::open(['route' => ['admin.pages.destroy', $page->id], 'method'=>'delete']) !!}
			<button type="submit" class="btn btn-xs btn-danger" data-confirm="Are you sure you want to delete this page?">delete</button>
			{!! Form::close() !!}
		</li>
	</ul>
</li>