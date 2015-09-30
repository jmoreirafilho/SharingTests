@extends('layouts.master')
@section('title', trans('title.user-index'))

@section('content')
<section ng-controller="viewController">
	@include('search-bar')
	<div class="col-md-10 col-md-offset-1">
		<div class="card text-left">
			<div class="card-title">@lang('title.user-index')</div>
			<div class="container-fluid">
				<table class="table">
					<tr ng-repeat="user in users | filter:search_bar" ng-model="modelo" ng-mouseover="modelo=true" ng-mouseleave="modelo=false" ng-class="selected(modelo)">
						<td class="text-left" ng-click="redirect(user.id)">
							@{{user.name}}
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	var users = {!! $users !!};
</script>
<script src="/scripts/my/user/index.js"></script>
@endsection