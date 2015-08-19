@extends('layouts.master')
@section('title', trans('title.college-create'))

@section('content')
@if(!Auth::check())
	<?php header("Location: /"); ?>
@endif
<section ng-controller="viewController">
	<div class="col-md-12">
		<div class="card">
			
			<h3>
				@lang('college.form-create-title')
			</h3>
			<hr>

			{!! Form::open(['route' => 'college.store']) !!}
			{!! Form::token() !!}
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						{!! Form::label('name', trans('college.form-name')) !!}
						{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>trans('college.ph-form-name'), 'ng-model'=>'name']) !!}
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						{!! Form::label('initials', trans('college.form-initial')) !!}
						{!! Form::text('initials', null, ['class'=>'form-control', 'placeholder'=>trans('college.ph-form-initial'), 'ng-model'=>'initials']) !!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-7">
					<div class="form-group">
						{!! Form::label('location_city', trans('college.form-search-city')) !!}
						{!! Form::text('search_location', null, ['class'=>'form-control', 'placeholder'=>trans('college.ph-form-search-city'), 'ng-model'=>'search', 'ng-change'=>'searching(search)', 'id'=>'search_location']) !!}
						{!! Form::hidden('location_city_id', '@{{location_city_id}}') !!}
						<div class="typeahead" id="typeahead" ng-show="search">
							<div class="typeahead-option" ng-repeat='city in cities' ng-click="getLocationId(city.id, city.city, city.state)">
								@{{city.city}} (@{{city.state}})
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						{!! Form::submit(trans('college.form-submit'), ['class'=>'btn btn-primary', 'ng-disabled'=>'!name||!initials']) !!}
					</div>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	angular.module('view').controller('viewController', function($scope, $http){
		$scope.searching = function (data){
			$http.get('http://sharingtests/searchLocation/'+data).success(function(result){
				$scope.cities = result;
			});
		};
		$scope.getLocationId = function(data, city, state){
			$scope.location_city_id = data;
			$scope.search = city+" ("+state+")";
		}
	});
</script>
<script>
	$("#search_location").on('focus', function(){
		$("#typeahead").show(300);
	}).on('blur', function(){
		$("#typeahead").hide(300);
	}).attr('autocomplete','off');
</script>
@endsection