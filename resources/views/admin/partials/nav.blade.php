<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="{{url('admin')}}">{{Config::get('site_info')['name']}}</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pages
						<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{url('admin/pages')}}">View</a></li>
						<li><a href="{{url('admin/pages/create')}}#">Create</a></li>
					</ul>
				</li>
				<!--<li><a href="#">Link</a></li>-->
			</ul>

			@if(Auth::user())
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->email }}
						<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="{{ url('auth/logout') }}">Logout</a></li>
					</ul>
				</li>
			</ul>
			@endif
		</div>

	</div>
</nav>
