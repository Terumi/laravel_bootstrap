<div class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">{{Config::get('site_info')['name']}}</a>
	</div>
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav">
			{!! $content !!}
		</ul>
	</div>
</div>