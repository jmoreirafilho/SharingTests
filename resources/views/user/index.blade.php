@extends('layouts.master')

@section('title', trans('title.user-index'))

@section('content')
<section ng-controller="viewController">
	<div class="col-md-12" ng-repeat="user in users">
		<div class="card">
			<h3 style="margin-top:10px;">@{{user.name}} - @{{user.email}} - @{{user.score.value}}</h3>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	angular.module('view').controller('viewController', function($scope){
		$scope.users = {!! $users !!};
	});
</script>
@endsection