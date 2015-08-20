@extends('layouts.master')
@section('title', trans('title.college-index'))

@section('content')
<section ng-controller="viewController">
	<div class="col-md-4" ng-repeat="college in colleges">
		<div class="card text-center">
			<div class="card-title">@{{college.initials}}</div>
			<p><small>@{{college.name}}</small><br />
			<small>@{{college.city}} - @{{college.state}}</small></p>
			<button class="btn btn-primary">@lang('college.select-button')</button>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	angular.module('view').controller('viewController', function($scope){
		$scope.colleges = {!! $colleges !!};
	});
</script>
@endsection