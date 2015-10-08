@extends('layouts.master')

@section('title', trans('title.home-create'))

@section('content')
<section ng-controller="viewController">
	<div class="col-md-12">
		<div class="card">
			<div class="title">@lang('title.user-profile')</div>
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
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label class="clickable" id="change_password">@lang('user.change_password')</label>
					</div>
				</div>
			</div>
			<div id="change_password" class="row hide">
				<div class="col-md-6">
					<div class="form-group">
						{!! Form::label('new_password', trans('user.new_password')) !!}
						{!! Form::password('new_password', ['class' => 'form-control', 'placeholder'=> trans('user.new_password_ph')]) !!}
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						{!! Form::label('check_new_password', trans('user.check_new_password')) !!}
						{!! Form::password('check_new_password', ['class' => 'form-control', 'placeholder'=> trans('user.check_new_password_ph')]) !!}
					</div>
				</div>
			</div>
			<div class="bottom">
				<div class="row">
					<div class="col-md-6">
						<a class="button pointer" ng-class="disabledClass()" ng-click="submit()">@lang('user.form-submit-profile')</a>
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
	var user = {!! $user !!};
</script>
<script src="/scripts/my/user/profile.js"></script>
@endsection