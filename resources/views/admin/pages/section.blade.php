<ul class="tree list-tree">
@include('admin.pages.page-item')
@foreach($page->subPages as $subPage)
	@include('admin.pages.section', ['page'=>$subPage, 'class' => 'space'])
@endforeach
</ul>