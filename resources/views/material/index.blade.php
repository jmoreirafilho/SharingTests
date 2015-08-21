@extends('layouts.master')
@section('title', trans('title.material-index'))

@section('content')
<section ng-controller="viewController">
	@include('search-bar')
	<div class="col-md-4" ng-repeat="material in materials">
		<div class="card text-center">
			<div class="card-title">@{{material.name}}</div>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	angular.module('view').controller('viewController', function($scope, $http){
		$scope.materials = {!! $materials !!};
		$scope.search_changed = function(data){
			if(data){
				$http.get('/searchMaterial/'+{!! $id !!}+'/'+data).success(function(result){
					$scope.materials = result;
				});
		 	} else{
		 		$scope.materials = {!! $materials !!};
		 	}
		};
	});
</script>
@endsection