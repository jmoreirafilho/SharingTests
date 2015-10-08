@extends('layouts.master')

@section('title', trans('title.home-create'))

@section('content')
<section ng-controller="viewController">
	<div class="col-md-12">
		<div class="card">
			<div class="title">@lang('title.user-profile') - @{{user.name}}</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						{!! Form::label('email', trans('user.form-email')) !!}
						{!! Form::text('email', '@{{user.email}}', ['class'=>'form-control', 'disabled']) !!}
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						{!! Form::label('name', trans('user.form-name')) !!}
						{!! Form::text('name', '@{{user.name}}', ['class'=>'form-control', 'disabled']) !!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						{!! Form::label('created_at', trans('user.form-member_since')) !!}
						{!! Form::text('created_at', '@{{user.created_at}}', ['class'=>'form-control', 'disabled']) !!}
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						{!! Form::label('updated_at', trans('user.form-last_update')) !!}
						{!! Form::text('updated_at', '@{{user.updated_at}}', ['class'=>'form-control', 'disabled']) !!}
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						{!! Form::label('name', trans('user.form-scores')) !!}
						{!! Form::text('name', '@{{user.score.value}}', ['class'=>'form-control', 'disabled']) !!}
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						{!! Form::label('status_level', trans('user.form-status_level')) !!}
						{!! Form::text('status_level', trans('user.status_level_user'), ['class'=>'form-control', 'ng-show'=>'isUser', 'ng-hide'=>'!isUser', 'disabled']) !!}
						{!! Form::text('status_level', trans('user.status_level_admin'), ['class'=>'form-control', 'ng-hide'=>'isUser', 'ng-show'=>'!isUser', 'disabled']) !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	var user = {!! $user !!};
</script>
<script src="/scripts/my/user/show.js"></script>
@endsection