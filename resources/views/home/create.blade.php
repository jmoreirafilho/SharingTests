@extends('layouts.master')

@section('title', trans('title.home-create'))

@section('content')
<section ng-controller="viewController">
	<div class="col-md-12">
		<div class="card">
			<div class="card-title">@lang('title.home-create')</div>
			{!! Form::open(['route' => 'home.store']) !!}
			{!! Form::token() !!}
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						{!! Form::label('email', trans('user.form-email')) !!}
						{!! Form::text('email', null, ['class'=>'form-control', 'placeholder' => trans('user.form-email-ph'), 'ng-model'=>'user.email']) !!}
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						{!! Form::label('name', trans('user.form-name')) !!}
						{!! Form::text('name', null, ['class'=>'form-control', 'placeholder' => trans('user.form-name-ph'), 'ng-model'=>'user.name']) !!}
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						{!! Form::label('password', trans('user.form-password')) !!}
						{!! Form::password('password', ['class'=>'form-control', 'placeholder'=>trans('user.form-password-ph'), 'ng-model'=>'user.pass1']) !!}
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						{!! Form::label('password-conf', trans('user.form-password').'*') !!}
						{!! Form::password('password-conf', ['class'=>'form-control', 'placeholder'=>trans('user.form-password-conf-ph'), 'ng-model'=>'user.pass2']) !!}
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						{!! Form::submit(trans('user.form-submit-create'), ['class'=>'btn btn-primary', 'ng-disabled'=>'checkAll(user)']) !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	angular.module('view').controller('viewController', function($scope){
		$scope.checkAll = function(data){
			if(data){
				if(data.name && data.email && data.pass1 && data.pass2 && (data.pass1 == data.pass2)){
					return false;
				}
			}
			return true;
		}
	});
</script>
@endsection