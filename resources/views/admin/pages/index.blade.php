@extends('layouts.admin')
@section('content')

<table class="table table-striped">
    <thead>
        <tr>
	        <th>Page Name</th>
	        <th>Parent Page</th>
	        <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pages as $page)
    <tr>
		<td>{{$page->title}}</td>
	    <td>{{$page->parent_page_name}}</td>
	    <td>
		    <a href="{{url('pages/'.$page->slug)}}" class="btn btn-xs btn-primary" target="_blank">view</a>
	    </td>
    </tr>
    @endforeach
    </tbody>
</table>

@stop