@extends('layouts.master')
@section('content')
@include('pages.nav')
@include('pages.breadcrumbs')
<h1>Contact</h1>
<div class="row">
	<div class="col-md-8">
		<h3>Send us a Message</h3>

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(Session::has('success'))
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <p>Thank you for contacting us.<br/> A representative will reply you as soon as possible.</p>
            </div>
        @endif

        {!! Form::open(['action' => 'EmailController@sendEmail', 'method' => 'post', 'id'=>'mail-form']) !!}
			<div class="control-group form-group">
				<div class="controls">
					<label>Full Name:</label>
                    <!-- Name field -->
                    <div class="form-group">
                        {!! Form::text('name', null, ['class'=>'form-control', 'id'=> 'name', 'data-validation-required-message' =>'Please enter your name.']) !!}
                    </div>

				</div>
			</div>
			<div class="control-group form-group">
				<div class="controls">
					<label>Phone Number:</label>
                    <!-- Tel field -->
                    <div class="form-group">
                        {!! Form::text('phone', null, ['class'=>'form-control', 'id'=> 'tel', 'data-validation-required-message' =>'Please enter your phone number.']) !!}
                    </div>

				</div>
			</div>
			<div class="control-group form-group">
				<div class="controls">
					<label>Email Address:</label>
                    <!-- Email field -->
                    <div class="form-group">
                        {!! Form::text('email', null, ['class'=>'form-control', 'id'=> 'email', 'data-validation-required-message'=>'Please enter your email address.']) !!}
                    </div>

				</div>
			</div>
			<div class="control-group form-group">
				<div class="controls">
					<label>Message:</label>
                    <!-- Message Field -->
                    <div class="form-group">
                        {!!Form::textarea('message', null, array('class' => 'form-control', 'data-validation-required-message'=>'Please enter your message', 'maxlength'=>'999' ,'style'=>'resize:none')) !!}
                    </div>

				</div>
			</div>
			<button type="submit" class="btn btn-primary">Send Message</button>
            {!! Form::close() !!}
	</div>
	<div class="col-md-4">
		<h3>My company</h3>
		<p>
			25 address, <br/>
			address <br/>
			address <br/>
		</p>
		<p><i class="fa fa-phone"></i>
			<abbr title="Phone">P</abbr>: (44) 2222222</p>
		<p><i class="fa fa-fax"></i>
			<abbr title="Phone">F</abbr>: (44) 22222</p>
		<p><i class="fa fa-envelope-o"></i>
			<abbr title="Email">E</abbr>: <a href="mailto:info@info.com">info@info.com</a>
		</p>
	</div>
</div>

@stop