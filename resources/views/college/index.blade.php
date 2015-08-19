@extends('layouts.master')
@section('title', trans('title.college-index'))

@section('content')
<section ng-controller="viewController">
	<div class="col-md-4" ng-repeat="college in colleges">
		<a href="" class="college-list">
			<div class="card college-list">
				<h3>@{{college.initials}}</h3>
				<small>@{{college.name}}</small><br />
				<small>@{{college.city}} - @{{college.state}}</small>
			</div>
		</a>
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