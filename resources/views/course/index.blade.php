@extends('layouts.master')
@section('title', trans('title.course-index'))

@section('content')
<section ng-controller="viewController">
	@include('search-bar')
	<div class="col-md-10 col-md-offset-1">
		<div class="card text-left">
			<div class="card-title">@lang('course.courses')</div>
			<div class="container-fluid">
				<table class="table">
					<tr ng-repeat="course in courses | filter:search_bar" ng-model="modelo" ng-mouseover="modelo=true" ng-mouseleave="modelo=false" ng-class="selected(modelo)">
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
	angular.module('view').controller('viewController', function($scope){
		$scope.courses = {!! $courses !!};
		$scope.selected = function(pass){
			if(pass){
				return "option-hover";
			}
		}
		$scope.redirect = function(id){
			window.location.href = '/subject/'+id;
		};
		$scope.goBack = function(){
			window.history.back();
		}
	});
</script>
@endsection