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
			
			<div class="card-footer">
				<div class="row">
					<div class="col-md-6">
						<a class="btn-footer" ng-class="checkAll(user)" ng-click="submit()">@lang('home.confirm_button')</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
@endsection

@section('scripts')
<script src="/scripts/my/home/create.js"></script>
@endsection