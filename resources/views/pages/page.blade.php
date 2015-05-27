@extends('layouts.master')
@section('content')

@include('pages.nav')

<h1>{{$page->title}}</h1>
	{!!$page->body!!}
@stop