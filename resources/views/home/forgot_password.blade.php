@extends('layouts.master')
@section('title', trans('title.home-forgot_pass'))

@section('content')
<section ng-controller="viewController">
	<div class="col-md-12">
		<div class="card">
			<div class="title">@lang('title.home-forgot_pass')</div>
			{!! Form::open(['route'=>'home.recoveryPassword']) !!}
				<div class="row">
					<div class="col-md-6">
						<div class="form-group" id="email_content">
							{!! Form::label('email', trans('home.email')) !!}
							{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('home.email_ph'), 'ng-model'=>'email']) !!}
							@if(isset($invalidEmailError))
								<small>@lang('home.email_error')</small>
							@else
								<small>@lang('home.sended_message')</small>
							@endif
						</div>
					</div>
				</div>
				<div class="bottom">
					<div class="row">
						<div class="col-md-6">
							<a class="button pointer" ng-class="disabledClass()" ng-click="submit()">@lang('home.confirm-button')</a>
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