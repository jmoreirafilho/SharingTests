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
	@if(!Auth::check())
	<div class="login" id="login">
	{!! Form::open(['route'=>'home.login']) !!}
	{!! Form::token() !!}
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon addon-preferences"><i class="fa fa-at"></i></div>
			{!! Form::text('email', null, ['class'=>'form-control', 'placeholder' => trans('subject.placeholder-email')]) !!}
			</div>
	</div>
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon addon-preferences"><i class="fa fa-key"></i></div>
			{!! Form::password('password', ['class'=>'form-control', 'placeholder' => trans('subject.placeholder-password')]) !!}
		</div>
	</div>
	<div class="form-group">
		{!! Form::submit(trans('subject.submit_login'), ['class'=>'btn btn-login']) !!}
	</div>
	{!! Form::close() !!}
	</div>
	@else
	<div class="points" id="points">
		{!! Auth::user()->score->value !!} <small>pts</small>
	</div>
	@endif
	<div class="menu" role="navigation">
		<div class="col-md-1 logo-icon">&nbsp;</div>
		<div class="col-md-2 user-name-space" id="open-points">
			@if(Auth::check())
				<i class="fa fa-user"></i> {!! Auth::user()->name !!}
			@else
				&nbsp;
			@endif
		</div>
		<div class="col-md-9 text-right">
			<div class="btn-group">
				<a href="{!! route('home.index') !!}" class="btn-menu">@lang('title.home-index')</a>
				@if(Auth::check())
					@if(Auth::check() && Auth::user()->status_level == 1)
					<a href="{!! route('user.index') !!}" class="btn-menu">@lang('title.user-index')</a>
					<a href="{!! route('college.create') !!}" class="btn-menu">@lang('title.college-create')</a>
					<a href="{!! route('subject.filter') !!}" class="btn-menu">@lang('title.subject-filter')</a>
					@endif
					<a href="{!! route('college.index') !!}" class="btn-menu">@lang('title.college-index')</a>
					<a href="{!! route('subject.create') !!}" class="btn-menu">@lang('title.subject-create')</a>
					@else
					<a href="{!! route('home.create') !!}" class="btn-menu">@lang('title.home-create')</a>
					@endif
				<a href="{!! route('home.donate') !!}" class="btn-menu">@lang('title.home-donate')</a>
				@if(!Auth::check())
				<a href="" class="btn-menu" id="show-login"><i class="fa fa-sign-in">&nbsp;</i></a>
				@else
				<a href="{!! route('user.logout') !!}" class="btn-menu"><i class="fa fa-sign-out">&nbsp;</i></a>
				@endif
			</div>
		</div>
	</div>
	<div class="logo-banner">&nbsp;</div>

	<div class="col-md-9 content">
		@yield('content')
	</div>
	<div class="col-md-3 content">
		<section>
			<div class="col-md-12">
				<div class="card card-ads">
					ADS
				</div>			
			</div>
		</section>
		@yield('ads')
	</div>

	<div class="col-md-12 footer" role="navigation">
		Footer
	</div>

</body>

<script type="text/javascript" src="/scripts/jquery/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="/scripts/angularjs/angular.min.js"></script>
<script type="text/javascript" src="/scripts/my/my.js"></script>
@yield('scripts')
</html>