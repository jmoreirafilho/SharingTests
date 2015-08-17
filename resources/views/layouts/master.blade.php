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
						<div id="menu_home" class="menu menu_home"></div>
						<div id="menu_search" class="menu menu_search"></div>
						<div id="menu_create" class="menu menu_create"></div>
						<div id="menu_donate" class="menu menu_donate"></div>

						<a href="{!! route('material.index') !!}" class="btn-menu" id="home">@lang('menu.home')</a>
						<a href="/search" class="btn-menu" id="search">@lang('menu.search')</a>
						<a href="{!! route('material.create') !!}" class="btn-menu" id="create">@lang('menu.create')</a>
						<a href="/donate" class="btn-menu" id="donate">@lang('menu.donate')</a>
					</div>
				</div>
				<div class="col-md-5 top-buffer">
					{!! Form::open(['route'=>'user.login']) !!}
					<div class="form-horizontal">
						<div class="form-group">
							{!! Form::label('email', trans('material.username'), ['class' => 'col-md-2 control-label']) !!}
							<div class="col-md-10">
								{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('material.placeholder_username'), 'ng-model'=>'username']) !!}
							</div>
						</div>
						<div class="form-group">
							{!! Form::label('password', trans('material.password'), ['class' => 'col-md-2 control-label']) !!}
							<div class="col-md-7">
								{!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('material.placeholder_password')]) !!}
							</div>
							<div class="col-md-3">
								{!! Form::submit(trans('material.submit_login'), ['class' => 'btn btn-primary btn-block']) !!}
							</div>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
		<hr class="no-top-margin" />
	</div>

@yield('content')

	<div class="footer">
		Footer
	</div>

</body>

<script type="text/javascript" src="/scripts/jquery/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="/scripts/angularjs/angular.min.js"></script>
<script type="text/javascript" src="/scripts/my/my.js"></script>
@yield('scripts')
</html>