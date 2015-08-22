@extends('layouts.master')
@section('title', trans('title.material-index'))

@section('content')
<section ng-controller="viewController">
	@include('search-bar')
	<div class="col-md-10 col-md-offset-1">
		<div class="card text-center">
			<div class="card-title">Materials</div>
			<div class="container-fluid">
				<table class="table">
					<tr ng-repeat="material in materials" ng-model="modelo" ng-mouseover="modelo=true" ng-mouseleave="modelo=false" ng-class="selected(modelo)">
						<td class="text-left" ng-click="redirect(material.id)">
							@{{material.name}}
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
		$scope.selected = function(pass){
			if(pass){
				return "option-hover";
			}
		}
		$scope.redirect = function(id){
			window.location.href = '/material/'+id;
		}
	});
</script>
@endsection