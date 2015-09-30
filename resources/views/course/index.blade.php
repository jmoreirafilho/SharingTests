@extends('layouts.master')
@section('title', trans('title.course-index'))

@section('content')
<section ng-controller="viewController">
	@include('search-bar')
	<div class="col-md-10 col-md-offset-1">
		<div class="card text-left">
			<div class="card-title">@lang('course.courses')</div>
			<div class="container-fluid">
				<table class="table">
					<tr ng-repeat="course in courses | filter:search_bar" ng-model="modelo" ng-mouseover="modelo=true" ng-mouseleave="modelo=false" ng-class="selected(modelo)">
						<td class="text-left" ng-click="redirect(course.id)">
							@{{course.name}}
						</td>
					</tr>
				</table>
				<table class="nomeDaClasse">
					<tr>
						<td id="nomedaid"></td>
						<td id="nomedaid"></td>
						<td id="nomedaid"></td>
					</tr>
					<tr>
						<td id="nomedaid"></td>
						<td id="nomedaid"></td>
						<td id="nomedaid"></td>
					</tr>
					<tr>
						<td id="nomedaid"></td>
						<td id="nomedaid"></td>
						<td id="nomedaid"></td>
					</tr>
					<tr>
						<td id="nomedaid"></td>
						<td id="nomedaid"></td>
						<td id="nomedaid"></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	var courses = {!! $courses !!};
</script>
<script src="/scripts/my/course/index.js"></script>
@endsection