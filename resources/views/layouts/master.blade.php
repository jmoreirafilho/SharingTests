<!DOCTYPE html>
<html ng-app="view">
<head>
	<title>
		@yield('title')
	</title>
	<link rel="stylesheet" type="text/css" href="/scripts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/scripts/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/scripts/my/my.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 top-buffer">
				<div class="col-md-2 text-center">
					<font style="font-size:75px;">STP</font>
				</div>
				<div class="col-md-5 text-center">
					<div class="btn-group bot-buffer" role="group">
						<a href="{!! route('material.index') !!}" class="btn btn-menu">@lang('menu.home')</a>
						<a href="/search" class="btn btn-menu">@lang('menu.search')</a>
						<a href="{!! route('material.create') !!}" class="btn btn-menu">@lang('menu.create')</a>
						<a href="/donate" class="btn btn-menu">@lang('menu.donate')</a>
					</div>
				</div>
				<div class="col-md-5">
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
		<hr style="margin-top:0px;" />
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