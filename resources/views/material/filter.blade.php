@extends('layouts.master')

@section('title', trans('title.material-filter'))

@section('content')
<section ng-controller="viewController">
	@include('search-bar')
	<div class="col-md-10 col-md-offset-1">
		<div class="card text-left">
			<div class="title">@lang('title.material-filter')</div>
			<div class="container-fluid">
				<table class="table">
					<head>
						<th>Date</th>
						<th>Description</th>
						<th></th>
						<th></th>
						<th></th>
					</head>
					<tr ng-repeat="material in (filteredMaterials = (materials | filter:search_bar:description))" ng-model="modelo" ng-mouseover="modelo=true" ng-mouseleave="modelo=false">
						<td>
							@{{material.created_at}}
						</td>
						<td class="text-left">
							@{{material.description}}
						</td>
						<td class="actions" ng-click="showMaterial(material.link_url)">
							<i class="fa fa-file-pdf-o" class="action-icons"></i>
						</td>
						<td class="actions" ng-click="recuseMaterial(material.id)">
							<i class="fa fa-close" class="action-icons"></i>
						</td>
						<td class="actions" ng-click="approveMaterial(material.id)">
							<i class="fa fa-check" class="action-icons"></i>
						</td>
					</tr>
				</table>
				<div class="alert alert-warning hide" id="alertEmpty" ng-class="checkAlert(filteredMaterials)">
					@lang('material.empty_result')
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	var material = {!! $material !!};
</script>
<script src="/scripts/my/material/filter.js"></script>
@endsection