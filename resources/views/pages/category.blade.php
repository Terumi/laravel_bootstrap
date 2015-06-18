@extends('layouts.master')
@section('content')
	@include('pages.nav')
	@include('pages.breadcrumbs')
	@foreach($children as $subPage)
		<h3>{{$subPage->title}}</h3>
		<p>{{$subPage->description}}</p>
	@endforeach
@stop