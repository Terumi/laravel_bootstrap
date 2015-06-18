@extends('layouts.master')
@section('content')
@include('pages.nav')
@include('pages.breadcrumbs')
<h1>{{$page->title}}</h1>
{!!$page->body!!}
@include('layouts.partials.social')

@stop