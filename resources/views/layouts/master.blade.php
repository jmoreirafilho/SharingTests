<!DOCTYPE html>
<html ng-app="view">
<head>
	<title>
		@yield('title')
	</title>
	<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/scripts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/scripts/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/scripts/my/my.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-3 text-center logo-image">
				<br />
				</div>
				<div class="col-md-4 text-center top-buffer">
					<div class="btn-group bot-buffer" role="group">
						<a href="{!! route('subject.home') !!}" class="btn-menu">@lang('menu.home')</a>
						<a href="{!! route('college.index') !!}" class="btn-menu">@lang('menu.search')</a>
						<a href="{!! route('upload.create') !!}" class="btn-menu">@lang('menu.create')</a>
						<a href="{!! route('user.donate') !!}" class="btn-menu">@lang('menu.donate')</a>
					</div>
				</div>
			</div>
		</div>
		<hr class="no-top-margin" />
	</div>

@yield('content')

	<div class="navbar navbar-inverse navbar-fixed-bottom footer" role="navigation">
		Footer
	</div>

</body>

<script type="text/javascript" src="/scripts/jquery/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="/scripts/angularjs/angular.min.js"></script>
<script type="text/javascript" src="/scripts/my/my.js"></script>
@yield('scripts')
</html>