@extends('layouts.master')
@section('title', trans('title.home-index'))

@section('content')
<section>
	<div class="col-md-7">
		<div class="card">
			<div class="title">@lang('title.home-index')</div>
			<h4>@lang('home.init-text-1')</h3>
		</div>
	</div>
	<div class="col-md-5">
		<div class="card">
			<div class="title">@lang('home.about-title')</div>
			<p>@lang('home.about-text-1')</p>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="title">@lang('home.tutorial-title')</div>
			<p>@lang('home.tutorial-text-1')</p>
			<p>@lang('home.tutorial-text-2')</p>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="title">@lang('home.problems-title')</div>
			<p>@lang('home.problems-text-1')</p>
			<p>@lang('home.problems-text-2')</p>
		</div>
	</div>
</section>
@endsection