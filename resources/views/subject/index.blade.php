@extends('layouts.master')
@section('title', trans('title.subject-index'))

@section('content')
<section ng-controller="viewController">
	<div class="col-md-4" ng-repeat="subject in subjects">
		<div class="card text-center">
			<div class="card-title">@{{subject.name}}</div>
			<a href="/material/@{{subject.id}}"><button class="btn btn-primary">@lang('college.select-button')</button></a>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	angular.module('view').controller('viewController', function($scope){
		$scope.subjects = {!! $subjects !!};
	});
</script>
@endsection