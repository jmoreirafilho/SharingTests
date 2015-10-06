@extends('layouts.master')
@section('title', trans('title.college-create'))

@section('content')
<section ng-controller="viewController">
	<div class="col-md-12">
		<div class="card">
			<div class="card-title">
				@lang('title.college-create')
			</div>

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
							<div class="typeahead-option" ng-hide="emptyCityResult" ng-repeat='city in cities' ng-click="getLocationId(city.id, city.city, city.state)">
								@{{city.city}} (@{{city.state}})
							</div>
							<div class="alert alert-warning" ng-show="emptyCityResult">
								@lang('college.emptyCityResult')
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-md-6">
						<a class="btn-footer" ng-class="disabledClass()" ng-click="submit()">@lang('college.form-submit')</a>
					</div>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script src="/scripts/my/college/create.js"></script>
@endsection