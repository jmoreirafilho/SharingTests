@extends('layouts.master')
@section('title', trans('title.college-index'))

@section('content')
<section ng-controller="viewController">
	@include('search-bar')
	<div class="col-md-4" ng-repeat="college in (filteredColleges = (colleges | filter:search_bar))">
		<div class="card text-center">
			<div class="card-title">@{{college.initials}}</div>
			<p><small>@{{college.name}}</small><br />
			<small>@{{college.city}} - @{{college.state}}</small></p>
			<a href="/course/@{{college.id}}"><button class="btn btn-primary">@lang('college.select-button')</button></a>
		</div>
	</div>
	<div class="col-md-10 col-md-offset-1">
		<div class="alert alert-warning hide" id="alertEmpty" ng-class="checkAlert(filteredColleges)">
			@lang('college.empty_result')
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	var colleges = {!! $colleges !!};
</script>
<script src="/scripts/my/college/index.js"></script>
@endsection