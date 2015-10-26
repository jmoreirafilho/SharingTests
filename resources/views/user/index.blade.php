@extends('layouts.master')
@section('title', trans('title.user-index'))

@section('content')
<section ng-controller="viewController">
	@include('search-bar')
	<div class="col-md-10 col-md-offset-1">
		<div class="card text-left">
			<div class="title">@lang('title.user-index')</div>
			<div class="container-fluid">
				<table class="table">
					<thead>
						<th>@lang('user.form-name')</th>
						<th>@lang('user.form-status-level')</th>
						<th></th>
					</thead>
					<tbody>
						<tr ng-repeat="user in (filteredUsers = (users | filter:search_bar))" ng-model="modelo" ng-mouseover="modelo=true" ng-mouseleave="modelo=false" ng-class="selected(modelo)" ng-click="redirect(user.id)">
							<td class="text-left">
								@{{user.name}}
							</td>
							<td>
								@{{ getStatusLevel(user.status_level) }}
							</td>
							<td align="center">
								<i class="fa fa-close" ng-click="$event.stopPropagation() || deleteUser(user.id)"></i>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="alert alert-warning hide" id="alertEmpty" ng-class="checkAlert(filteredUsers)">
					@lang('user.empty_result')
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	var users = {!! $users !!};
	var admin = "{!! trans('user.status_level_admin') !!}";
	var client = "{!! trans('user.status_level_user') !!}";
</script>
<script src="/scripts/my/user/index.js"></script>
@endsection