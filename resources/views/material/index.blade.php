@extends('layouts.master')
@section('title', trans('title.material-index'))

@section('content')
<section ng-controller="viewController">
	<div class="col-md-4" ng-repeat="material in materials">
		<div class="card text-center">
			<div class="card-title">@{{material.name}}</div>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	angular.module('view').controller('viewController', function($scope){
		$scope.materials = {!! $materials !!};
	});
</script>
@endsection