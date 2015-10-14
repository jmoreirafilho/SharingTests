<div class="modal fade" id="myModalCollegeCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" ng-controller="viewCollegeCreateModalController">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                <h4 class="modal-title" id="myModalLabel">@lang('title.home-create')</h4>
            </div>
            <div class="modal-body">
            	{!! Form::open(['route' => 'college.store']) !!}
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								{!! Form::label('name', trans('college.form-name')) !!}
								{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>trans('college.ph-form-name'), 'ng-model'=>'name']) !!}
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								{!! Form::label('initials', trans('college.form-initial')) !!}
								{!! Form::text('initials', null, ['class'=>'form-control', 'placeholder'=>trans('college.ph-form-initial'), 'ng-model'=>'initials']) !!}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								{!! Form::label('location_city', trans('college.form-search-city')) !!}
								{!! Form::text('search_location', null, ['class'=>'form-control', 'placeholder'=>trans('college.ph-form-search-city'), 'ng-model'=>'search', 'ng-change'=>'searching(search)', 'id'=>'search_location']) !!}
								{!! Form::hidden('location_city_id', '@{{location_city_id}}') !!}
								<div class="typeahead" id="typeahead" ng-show="search">
									<div class="typeahead-option" ng-hide="emptyCityResult" ng-repeat='city in cities' ng-click="getLocationId(city.id, city.city, city.state)">
										@{{city.city}} (@{{city.state}})
									</div>
									<div class="alert alert-warning" ng-show="emptyCityResult">
										@lang('college.emptyCityResult')
									</div>
								</div>
							</div>
						</div>
					</div>
				{!! Form::close() !!}
            </div>
            <div class="modal-footer bottom">
                <a class="button pointer" data-dismiss="modal" ng-click="clearAll()">@lang('home.cancel-button')</button>
                <a class="button pointer" ng-class="disabledClass()" ng-click="submit()">@lang('college.form-submit')</a>
            </div>
        </div>
    </div>
</div>

@section('modal_scripts')
<script src="/scripts/my/college/create.js"></script>
@endsection