@extends('layouts.admin')
@section('content')
<h1>Create page</h1>

@include('admin.partials.errors')

{!! Form::open(['route'=>'admin.pages.store', 'method'=>'post']) !!}
<!-- Title field -->
<div class="form-group">
	<label for="title" class="control-label">Title:</label>
	{!! Form::text('title', null, ['class'=>'form-control', 'id'=> 'title']) !!}
</div>

<!-- Menu_title field -->
<div class="form-group">
	<label for="menu_title" class="control-label">Menu title:</label>
	{!! Form::text('menu_title', null, ['class'=>'form-control', 'id'=> 'menu_title']) !!}
</div>

<!-- Slug field -->
<div class="form-group">
	<label for="slug" class="control-label">Slug:</label>
	{!! Form::text('slug', null, ['class'=>'form-control', 'id'=> 'slug']) !!}
</div>

<!-- Body field -->
<div class="form-group">
	<label for="body" class="control-label">Body:</label>
	{!! Form::textarea('body', null, ['class'=>'form-control', 'id'=> 'body', 'rows' => 30]) !!}
</div>

<!-- Description field -->
<div class="form-group">
	<label for="description" class="control-label">Description:</label>
	{!! Form::textarea('description', null, ['class'=>'form-control', 'id'=> 'description']) !!}
</div>

<!-- Parent_id Field -->
<div class="form-group">
	{!!Form::label('parent_page', 'Parent page:')!!}
	{!!Form::select('parent_page', [0=>'none'] + [1=>'test', 2=>'test2'], null, array('class'=>'form-control') ) !!}
</div>

<!-- Priority field -->
<div class="form-group">
	<label for="priority" class="control-label">Priority:</label>
	{!! Form::text('priority', 0, ['class'=>'form-control', 'id'=> 'priority']) !!}
</div>

<!-- Meta_title field -->
<div class="form-group">
	<label for="meta_title" class="control-label">Meta Title:</label>
	{!! Form::text('meta_title', null, ['class'=>'form-control', 'id'=> 'meta_title']) !!}
</div>

<!-- Meta_description field -->
<div class="form-group">
	<label for="meta_description" class="control-label">Meta Description:</label>
	{!! Form::text('meta_description', null, ['class'=>'form-control', 'id'=> 'meta_description']) !!}
</div>

<!-- Meta_content field -->
<div class="form-group">
	<label for="meta_content" class="control-label">Meta Content:</label>
	{!! Form::text('meta_content', null, ['class'=>'form-control', 'id'=> 'meta_content']) !!}
</div>

<!-- Meta_canonical field -->
<div class="form-group">
	<label for="meta_canonical" class="control-label">Meta Canonical:</label>
	{!! Form::text('meta_canonical', null, ['class'=>'form-control', 'id'=> 'meta_canonical']) !!}
</div>

<!-- Submit button -->
<div class="form-group">
	<button type="submit" class="btn btn-primary">Save</button>
</div>

{!! Form::close() !!}
@stop