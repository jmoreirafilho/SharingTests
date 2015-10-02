@extends('layouts.master')
@section('title', trans('title.home-forgot_pass'))

@section('content')
<section ng-controller="viewController">
	<div class="col-md-12">
		<div class="card">
			<div class="card-title">@lang('title.home-forgot_pass')</div>
			{!! Form::open() !!}
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="form-group" id="email_content">
							{!! Form::label('email', trans('home.email')) !!}
							{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('home.email_ph'), 'ng-model'=>'email']) !!}
							<small>@lang('home.sended_message')</small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="form-group">
							<label class="btn btn-primary" id="fake_button">@lang('home.confirm_button')</label>
							{!! Form::submit(null, ['id'=>'confirm_button', 'class' => 'hide']) !!}
						</div>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script src="/scripts/my/home/forgot_password.js"></script>
@endsection