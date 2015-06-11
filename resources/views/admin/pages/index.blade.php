@extends('layouts.admin')
@section('content')

    @foreach($pages as $page)
        @include('admin.pages.section')
    @endforeach

<script>
	$('label.tree-toggler').click(function () {
		$(this).parent().parent().children('ul.tree').toggle(150);
	});
</script>

<style>
	.nav-list {
		padding-right: 15px;
		padding-left: 15px;
		margin-bottom: 0;
	}



</style>


@stop