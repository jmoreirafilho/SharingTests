@extends('layouts.master')
@section('title', trans('title.course-index'))

@section('content')
<section ng-controller="viewController">
	@include('search-bar')
	<div class="col-md-10 col-md-offset-1">
		<div class="card text-center">
			<div class="card-title">Cursos</div>
			<div class="container-fluid">
				<table class="table">
					<tr ng-repeat="course in courses" ng-model="modelo" ng-mouseover="modelo=true" ng-mouseleave="modelo=false" ng-class="selected(modelo)">
						<td class="text-left" ng-click="redirect(course.id)">
							@{{course.name}}
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
	angular.module('view').controller('viewController', function($scope, $http, $location){
		$scope.courses = {!! $courses !!};
		$scope.search_changed = function(data){
			if(data){
				$http.get('/searchCourse/'+{!! $id !!}+'/'+data).success(function(result){
					$scope.courses = result;
				});
		 	} else{
		 		$scope.courses = {!! $courses !!};
		 	}
		};
		$scope.selected = function(pass){
			if(pass){
				return "option-hover";
			}
		}
		$scope.redirect = function(id){
			window.location.href = '/subject/'+id;
		}
	});
</script>
@endsection