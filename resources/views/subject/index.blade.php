@extends('layouts.master')
@section('title', trans('title.subject-index'))

@section('content')
<section ng-controller="viewController">
	@include('search-bar')
	<div class="col-md-10 col-md-offset-1">
		<div class="card text-left">
			<div class="title">@lang('subject.subjects')</div>
			<div class="container-fluid">
				<table class="table">
					<tr ng-repeat="subject in (filteredSubjects = (subjects | filter:search_bar))" ng-model="modelo" ng-mouseover="modelo=true" ng-mouseleave="modelo=false" ng-class="selected(modelo)">
						<td class="text-left" ng-click="redirect(subject.id)">
							@{{subject.name}}
						</td>
					</tr>
				</table>
				<div class="alert alert-warning hide" id="alertEmpty" ng-class="checkAlert(filteredSubjects)">
					@lang('subject.empty_result')
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	var subjects = {!! $subjects !!};
	var id = {!! $id !!};
</script>
<script src="/scripts/my/subject/index.js"></script>
@endsection