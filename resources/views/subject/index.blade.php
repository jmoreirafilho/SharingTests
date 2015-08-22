@extends('layouts.master')
@section('title', trans('title.subject-index'))

@section('content')
<section ng-controller="viewController">
	@include('search-bar')
	<div class="col-md-10 col-md-offset-1">
		<div class="card text-center">
			<div class="card-title">Subjects</div>
			<div class="container-fluid">
				<table class="table">
					<tr ng-repeat="subject in subjects" ng-model="modelo" ng-mouseover="modelo=true" ng-mouseleave="modelo=false" ng-class="selected(modelo)">
						<td class="text-left" ng-click="redirect(subject.id)">
							@{{subject.name}}
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
		$scope.subjects = {!! $subjects !!};
		$scope.search_changed = function(data){
			if(data){
				$http.get('/searchSubject/'+{!! $id !!}+'/'+data).success(function(result){
					$scope.subjects = result;
				});
		 	} else{
		 		$scope.subjects = {!! $subjects !!};
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