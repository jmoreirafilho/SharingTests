@extends('layouts.master')
@section('title', trans('title.material-index'))

@section('content')
<section ng-controller="viewController">
	@include('search-bar')
	<div class="col-md-10 col-md-offset-1">
		<div class="card text-left">
			<div class="card-title">@lang('material.materials')</div>
			<div class="container-fluid">
				<table class="table">
					<tr ng-repeat="material in (filteredMaterials = (materials | filter:search_bar))" ng-model="modelo" ng-mouseover="modelo=true" ng-mouseleave="modelo=false" ng-class="selected(modelo)">
						<td class="text-left" ng-click="redirect(material.id)">
							@{{material.description}}
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
	<script src="/scripts/my/material/index.js"></script>
@endsection