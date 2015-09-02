@extends('layouts.master')

@section('title', trans('title.home-create'))

@section('content')
<section ng-controller="viewController">
	<div class="col-md-12">
		<div class="card">
			<div class="card-title">@lang('title.user-profile')</div>
			{!! Form::open(['method'=>'PUT', 'route'=>['user.updateProfile', \Auth::id()]]) !!}
			<div class="row">
				<div class="col-md-7">
					<div class="form-group">
						{!! Form::label('email', trans('user.form-email')) !!}
						{!! Form::text('email', '@{{user.email}}', ['class'=>'form-control', 'disabled']) !!}
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						{!! Form::label('created_at', trans('user.form-member_since')) !!}
						{!! Form::text('created_at', '@{{user.created_at}}', ['class'=>'form-control', 'disabled']) !!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="form-group">
						{!! Form::label('name', trans('user.form-name')) !!}
						{!! Form::text('name', null, ['class'=>'form-control', 'ng-model'=>'user.name']) !!}
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						{!! Form::submit(trans('user.form-submit-profile'), ['class'=>'btn btn-primary', 'ng-disabled' => '!user.name']) !!}
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
		$scope.user = {!! $user !!};
	});
</script>
@endsection