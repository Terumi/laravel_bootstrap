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
		    <ul class="list-inline list-btns">
			    <li><a href="{{url('pages/'.$page->slug)}}" class="btn btn-xs btn-primary" target="_blank">view</a></li>
			    <li><a href="{{url('pages/'.$page->slug.'/edit')}}" class="btn btn-xs btn-primary">edit</a></li>
			    <li>
				    {!! Form::open(['route' => ['pages.destroy', $page->id], 'method'=>'delete']) !!}
				    <button type="submit" class="btn btn-xs btn-danger">delete</button>
				    {!! Form::close() !!}
			    </li>
		    </ul>
	    </td>
    </tr>
    @endforeach
    </tbody>
</table>

@stop