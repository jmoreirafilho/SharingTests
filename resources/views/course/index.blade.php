@extends('layouts.master')
@section('title', trans('title.course-index'))

@section('content')
<section ng-controller="viewController">
	<div class="col-md-4" ng-repeat="course in courses">
		<div class="card text-center">
			<div class="card-title">@{{course.name}}</div>
			<a href="/subject/@{{course.id}}"><button class="btn btn-primary">@lang('college.select-button')</button></a>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	angular.module('view').controller('viewController', function($scope){
		$scope.courses = {!! $courses !!};
	});
</script>
@endsection