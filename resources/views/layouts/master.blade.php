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
		<!-- Menu Mobile -->
		<div class="visible-xs col-xs-2 visible-sm col-sm-2 pointer buttons text-center" id="menu-button">
			<i class="fa fa-navicon fa-2x"></i>
		</div>

		<!-- Logo esquerda superior -->
		<div class="col-md-1 col-xs-8 col-sm-8 icon">&nbsp;</div>
		
		<!-- Div oculta nome do usuario logado e pontuação -->
		<div class="col-md-2 hidden-xs hidden-sm name" id="open-points">
			@if(Auth::check())
				<i class="fa fa-user"></i> {!! Auth::user()->name !!}
			@else
				&nbsp;
			@endif
		</div>
		
		<!-- Login Mobile -->
		<div class="visible-xs col-xs-2 visible-sm col-sm-2 pointer buttons text-center">
			@if(!Auth::check())
				<a class="pointer" data-toggle="modal" data-target="#myModalHomeLogin"><i class="fa fa-sign-in fa-2x">&nbsp;</i></a>
			@else
				<a href="{!! route('user.logout') !!}"><i class="fa fa-sign-out fa-2x">&nbsp;</i></a>
			@endif
		</div>

		<!-- Menu de opções -->
		<!-- MD -->
		<div class="col-md-9 menu-pc visible-md visible-lg">
			<div class="btn-group">
				@if(Auth::check())
				<a href="{!! route('user.profile') !!}" class="btn-menu">@lang('menu.profile')</a>
				@else
				<a href="{!! route('home.index') !!}" class="btn-menu">@lang('menu.tutorial')</a>
				@endif
				@if(Auth::check())
					@if(Auth::check() && Auth::user()->status_level == 1)
					<a href="{!! route('user.index') !!}">@lang('menu.users')</a>
					<a class="pointer" data-toggle="modal" data-target="#myModalCollegeCreate">@lang('menu.add-college')</a>
					<a href="{!! route('material.filter') !!}">@lang('menu.filter-material')</a>
					@endif
				<a href="{!! route('college.index') !!}">@lang('menu.colleges')</a>
				<a href="{!! route('material.create') !!}">@lang('menu.add-material')</a>
				@else
				<a class="pointer" data-toggle="modal" data-target="#myModalHomeCreate">@lang('menu.add-user')</a>
				<a href="#about">@lang('menu.about')</a>
				<a href="#faq">@lang('menu.faq')</a>
				@endif
				<a href="{!! route('home.donate') !!}">@lang('menu.donate')</a>
				@if(!Auth::check())
				<!-- <a href="" id="show-login" ><i class="fa fa-sign-in">&nbsp;</i></a> -->
				<a class="pointer" data-toggle="modal" data-target="#myModalHomeLogin"><i class="fa fa-sign-in">&nbsp;</i></a>
				@else
				<a href="{!! route('user.logout') !!}"><i class="fa fa-sign-out">&nbsp;</i></a>
				@endif
			</div>
		</div>
	</div>

	<!-- MOBILE -->
	<div class="visible-xs visible-sm">
		<div class="col-xs-10 col-sm-8 menu-mobile" id="mobile-menu-options">
			@if(Auth::check())
				<div class="row">
					<a href="{!! route('user.profile') !!}"><div class="col-xs-12 col-sm-12">@lang('menu.profile')</div></a>
				</div>
			@else
				<div class="row">
					<a href="{!! route('home.index') !!}"><div class="col-xs-12 col-sm-12">@lang('menu.tutorial')</div></a>
				</div>
			@endif
			@if(Auth::check())
				@if(Auth::check() && Auth::user()->status_level == 1)
					<div class="row">
						<a href="{!! route('user.index') !!}"><div class="col-xs-12 col-sm-12">@lang('menu.users')</div></a>
					</div>
					<div class="row">
						<a class="pointer" data-toggle="modal" data-target="#myModalCollegeCreate"><div class="col-xs-12 col-sm-12">@lang('menu.add-college')</div></a>
					</div>
					<div class="row">
						<a href="{!! route('material.filter') !!}"><div class="col-xs-12 col-sm-12">@lang('menu.filter-material')</div></a>
					</div>
				@endif
				<div class="row">
					<a href="{!! route('college.index') !!}"><div class="col-xs-12 col-sm-12">@lang('menu.colleges')</div></a>
				</div>
				<div class="row">
					<a href="{!! route('material.create') !!}"><div class="col-xs-12 col-sm-12">@lang('menu.add-material')</div></a>
				</div>
			@else
			<div class="row">
				<a class="pointer" data-toggle="modal" data-target="#myModalHomeCreate"><div class="col-xs-12 col-sm-12">@lang('menu.add-user')</div></a>
			</div>
			@endif
			<div class="row">
				<a href="{!! route('home.donate') !!}"><div class="col-xs-12 col-sm-12">@lang('menu.donate')</div></a>
			</div>
		</div>
		<div class="modal-back-window hide" id="modal-back-window"></div>
	</div>
	<!-- Menu de opções -->

	@if(Auth::check() && Auth::user()->status_level == 1)
		@include('college.create')
	@else
		@include('home.login')
		@include('home.create')
	@endif

	<div class="logo-banner-pc visible-lg visible-md">&nbsp;</div>
	<div class="logo-banner-mobile visible-sm">&nbsp;</div>
	<div class="logo-banner-mobile visible-xs">&nbsp;</div>

	<div class="col-lg-offset-1 col-lg-8 col-md-9 col-sm-12 col-xs-12 div-content">
		@yield('content')
	</div>
	<div class="col-lg-2 col-md-3 visible-lg visible-md div-content">
		<section>
			<div class="col-md-12">
				<div class="card card-ads">
					ADS
				</div>			
			</div>
		</section>
		@yield('ads')
	</div>

	<div class="col-md-12 col-sm-12 col-xs-12 footer" role="navigation">
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