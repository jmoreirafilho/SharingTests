<!DOCTYPE html>
<html ng-app="view">
<head>
	<title>
		@yield('title')
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="/scripts/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/scripts/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/scripts/my/my.css">
	@yield('styles')
</head>
<body>
	@if(Auth::check())
	<div class="points" id="points">
		<div class="col-md-2">
			<i class="fa fa-trophy"></i>
		</div>
		<div class="col-md-10 text-left">
			{!! Auth::user()->score->value !!} <small>pts</small>
		</div>
	</div>
	@endif
	<div class="menu" role="navigation">
		<!-- Logo esquerda superior -->
		<div class="col-md-1 icon">&nbsp;</div>
		<!-- Div oculta nome do usuario logado e pontuação -->
		<div class="col-md-2 name" id="open-points">
			@if(Auth::check())
				<i class="fa fa-user"></i> {!! Auth::user()->name !!}
			@else
				&nbsp;
			@endif
		</div>
		<!-- Menu de opções -->
		<div class="col-md-9 text-right">
			<div class="btn-group">
				@if(Auth::check())
				<a href="{!! route('user.profile') !!}" class="btn-menu">@lang('title.user-profile')</a>
				@else
				<a href="{!! route('home.index') !!}" class="btn-menu">@lang('title.home-index')</a>
				@endif
				@if(Auth::check())
					@if(Auth::check() && Auth::user()->status_level == 1)
					<a href="{!! route('user.index') !!}">@lang('title.user-index')</a>
					<a class="pointer" data-toggle="modal" data-target="#myModalCollegeCreate">@lang('title.college-create')</a>
					<a href="{!! route('material.filter') !!}">@lang('title.material-filter')</a>
					@endif
				<a href="{!! route('college.index') !!}">@lang('title.college-index')</a>
				<a href="{!! route('material.create') !!}">@lang('title.material-create')</a>
				@else
				<a class="pointer" data-toggle="modal" data-target="#myModalHomeCreate">@lang('title.home-create')</a>
				@endif
				<a href="{!! route('home.donate') !!}">@lang('title.home-donate')</a>
				@if(!Auth::check())
				<!-- <a href="" id="show-login" ><i class="fa fa-sign-in">&nbsp;</i></a> -->
				<a class="pointer" data-toggle="modal" data-target="#myModalHomeLogin"><i class="fa fa-sign-in">&nbsp;</i></a>
				@else
				<a href="{!! route('user.logout') !!}"><i class="fa fa-sign-out">&nbsp;</i></a>
				@endif
			</div>
		</div>
	</div>
	
	@if(Auth::check() && Auth::user()->status_level == 1)
		@include('college.create')
	@else
		@include('home.login')
		@include('home.create')
	@endif

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


<!-- <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script> -->
<script type="text/javascript" src="/scripts/jquery/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="/scripts/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script> -->
<script type="text/javascript" src="/scripts/angularjs/angular.min.js"></script>
<script type="text/javascript" src="/scripts/my/my.js"></script>
@yield('scripts')
@if(Auth::check() && Auth::user()->status_level == 1)
	<script type="text/javascript" src="/scripts/my/college/create.js"></script>
@else
	<script type="text/javascript" src="/scripts/my/home/create.js"></script>
	<script type="text/javascript" src="/scripts/my/home/login.js"></script>
@endif
</html>