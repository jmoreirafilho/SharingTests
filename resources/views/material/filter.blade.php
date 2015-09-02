@extends('layouts.master')

@section('title', trans('title.material-filter'))

@section('content')
<section ng-controller="viewController">
	@include('search-bar')
	<div class="col-md-10 col-md-offset-1">
		<div class="card text-left">
			<div class="card-title">@lang('title.material-filter')</div>
			<div class="container-fluid">
				<table class="table">
					<head>
						<th>Date</th>
						<th>Description</th>
						<th></th>
						<th></th>
						<th></th>
					</head>
					<tr ng-repeat="material in materials | filter:search_bar:description" ng-model="modelo" ng-mouseover="modelo=true" ng-mouseleave="modelo=false">
						<td>
							@{{material.created_at}}
						</td>
						<td class="text-left">
							@{{material.description}}
						</td>
						<td class="actions" ng-click="showMaterial(material.link_url)">
							<i class="fa fa-eye" class="action-icons"></i>
						</td>
						<td class="actions" ng-click="recuseMaterial(material.id)">
							<i class="fa fa-close" class="action-icons"></i>
						</td>
						<td class="actions" ng-click="approveMaterial(material.id)">
							<i class="fa fa-check" class="action-icons"></i>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	angular.module('view').controller('viewController', function($scope, $http){
		$scope.materials = {!! $material !!};
		$scope.selected = function(pass){
			if(pass){
				return "option-hover";
			}
		};
		$scope.showMaterial = function(link){
			window.open('/'+link, '_blank');
		};
		$scope.recuseMaterial = function(id, data){
			$http.post('/updateFiltered/'+id, {status:'recused'}).success(function(){
				window.location = "/filter";
			});
		};
		$scope.approveMaterial = function(id){
			$http.post('/updateFiltered/'+id, {status:'approved'}).success(function(){
				window.location = "/filter";
			});
		};
	});
</script>
@endsection