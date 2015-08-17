@extends('layouts.master')

@section('title', trans('title.home'))

@section('content')
<div class="container-fluid" ng-controller="viewController">
	<div class="container">
		{!! Form::text('busca', null, ['class'=>'form-control', 'ng-model'=>'busca', 'ng-change' => 'setBusca()']) !!}
		<small>Voce esta buscando por <strong>@{{busca}}</strong></small>
	</div>
	<table class="table">
		<header>
			<th>ID</th>
			<th>City</th>
			<th>State</th>
		</header>
		<tr ng-repeat="location in locations">
			<td>@{{location.city_id}}</td>
			<td>@{{location.city}}</td>
			<td>@{{location.state}}</td>
		</tr>
	</table>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	angular.module('view').controller('viewController', function($scope, $http){
		$scope.setBusca = function (){
			$http.get('/searchLocation/' + $scope.busca).success(function(data) {
			$scope.locations = data;
		});
		};
	});
</script>
@endsection