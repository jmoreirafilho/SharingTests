<div class="modal fade" id="myModalHomeLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h4 class="modal-title" id="myModalLabel">@lang('title.home-create')</h4>
            </div>
            <div class="modal-body">
            	{!! Form::open(['route' => 'home.store']) !!}
                <div class="row">
					<div class="col-md-12">
						<div class="form-group" id="emailContent">
							{!! Form::label('email', trans('user.form-email')) !!}
							{!! Form::text('email', null, ['class'=>'form-control', 'placeholder' => trans('user.form-email-ph'), 'ng-model'=>'user.email', 'ng-change' => 'checkEmail(user)']) !!}
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10">
						<div class="form-group passwords">
							{!! Form::label('password', trans('user.form-password')) !!}
							{!! Form::password('password', ['class'=>'form-control', 'placeholder'=>trans('user.form-password-ph'), 'ng-model'=>'user.pass1', 'ng-change' => 'checkPasswords(user)']) !!}
						</div>
					</div>
				</div>
				{!! Form::close() !!}
            </div>
            <div class="modal-footer bottom">
                <a class="button pointer" data-dismiss="modal" ng-click="user = null || removeErrors()">@lang('home.cancel-button')</button>
                <a class="button pointer" ng-class="checkAll(user)" ng-click="submit()">@lang('home.confirm-button')</a>
            </div>
        </div>
    </div>
</div>