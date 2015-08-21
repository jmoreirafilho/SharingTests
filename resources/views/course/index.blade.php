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
					<tr ng-repeat="course in courses" ng-model="modelo" ng-mouseover="modelo=true" ng-mouseleave="modelo=false">
						<td class="text-left">
							<font ng-hide="modelo">@{{course.name}}</font> <strong ng-show='modelo'>@{{course.name}}</strong>
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
		$scope.hover = function(id){
			$scope.show = function(id){
				return true;
			}
		}
	});
</script>
@endsection