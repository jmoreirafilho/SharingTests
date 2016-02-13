@extends('layouts.master')

@section('title', trans('title.material-create'))

@section('content')
<section ng-controller="viewController">
	<div class="col-md-12">
		<div class="card">
			<div class="title">@lang('title.material-create')</div>
			<ul class="nav nav-tabs">
			  	<li role="presentation" ng-click="active('config')" ng-class="configClass"><a href="">@lang('material.config')</a></li>
			  	<li role="presentation" ng-click="active('material')" ng-class="materialClass"><a href="">@lang('material.upload')</a></li>
			</ul>
			<div class="tab-content">
				<div id="tab-config" class="tab-pane body" ng-class="configClass">
					<div class="form-group">
						<div class="row">
							<div class="col-md-8">
								{!! Form::label('college', trans('material.college')) !!}
								{!! Form::text('search_college', null, ['class'=>'form-control', 'ng-model' => 'material.college', 'ng-change'=> 'searchingColleges(material.college)', 'placeholder' => trans('material.college_ph'), 'id'=>'search_college']) !!}
								{!! Form::hidden('college', '@{{college_id}}') !!}
								<div ng-show="material.college" class="typeahead" id="typeahead">
									<div class="typeahead-option" ng-hide="emptyCityResult" ng-repeat='college in colleges' ng-click="getCollegeId(college.id, college.name, college.initials)">
										@{{college.name}} <strong>(@{{college.initials}})</strong>
									</div>
									<div class="alert alert-warning" ng-show="emptyCityResult">
										@lang('college.emptyCityResult')
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6" ng-show="showCourse" ng-hide="!showCourse">
								<div class="sub-card">
									<ul class="nav nav-tabs">
									  	<li role="presentation" ng-click="active('selectCourse')" ng-class="scCourseClass"><a href="">@lang('material.select')</a></li>
									  	<li role="presentation" ng-click="active('createCourse')" ng-class="crCourseClass"><a href="">@lang('material.create')</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane body" ng-class="scCourseClass">
											{!! Form::label('course', trans('material.select_course')) !!}
											<select name="course" ng-model="material.course" class="form-control" ng-change="selectedCourseId(material.course)">
												<option ng-repeat="course in courses" value="@{{course.id}}">@{{course.name}}</option>
											</select>
										</div>
										<div  class="tab-pane body" ng-class="crCourseClass">
											{!! Form::label('course', trans('material.create_course')) !!}
											{!! Form::text('course', null, ['class'=>'form-control', 'ng-model' => 'material.course', 'placeholder' => trans('material.course_ph')]) !!}
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6" ng-show="material.course" ng-hide="!material.course">
								<div class="sub-card">
									<ul class="nav nav-tabs">
									  	<li role="presentation" ng-click="active('selectSubject')" ng-class="scSubjectClass"><a href="">@lang('material.select')</a></li>
									  	<li role="presentation" ng-click="active('createSubject')" ng-class="crSubjectClass"><a href="">@lang('material.create')</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane body" ng-class="scSubjectClass">
											{!! Form::label('subject', trans('material.select_subject')) !!}
											<select name="subject" ng-model="material.subject" class="form-control" ng-change="selectedSubjectId(material.subject)">
												<option ng-repeat="subject in subjects" value="@{{subject.id}}">@{{subject.name}}</option>
											</select>
										</div>
										<div  class="tab-pane body" ng-class="crSubjectClass">
											{!! Form::label('subject', trans('material.create_subject')) !!}
											{!! Form::text('subject', null, ['class'=>'form-control', 'ng-model' => 'material.subject', 'placeholder' => trans('material.subject_ph')]) !!}
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div id="tab-material" class="tab-pane body" ng-class="materialClass">
					<div class="form-group">
						<div class="row">
							<div class="col-md-8">
								{!! Form::label('description', trans('material.description')) !!}
								{!! Form::text('description', null, ['class'=>'form-control', 'ng-model' => 'material.description', 'placeholder' => trans('material.description_ph')]) !!}
							</div>
							<div class="col-md-4">
								{!! Form::label('tag', trans('material.tag')) !!}
								{!! Form::select('tag', [''=>trans('material.tag_option_title'), '0'=>'Prova', '1'=>'Trabalho', '2'=>'Estudo'], null, ['class'=>'form-control', 'ng-model'=>'material.tag']) !!}
							</div>
						</div>
					</div>
					<div class="form-group sub-card">
						<div class="row">
							<div class="col-md-12">
								<ul class="nav nav-tabs">
								  	<li role="presentation" ng-click="selectUpload('photo')" ng-class="photoClass"><a href="">@lang('material.add_photos')</a></li>
								  	<li role="presentation" ng-click="selectUpload('pdf')" ng-class="pdfClass"><a href="">@lang('material.add_pdf')</a></li>
								</ul>
								<div class="tab-content">
									<div id="tab-photos" class="tab-pane body" ng-class="photoClass">
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
													Upload de Foto
												</div>
											</div>
										</div>
									</div>
									<div id="tab-photos" class="tab-pane body" ng-class="pdfClass">
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
													<label id="upa">Upload de PDF</label>
													{!! Form::file('pdf', ['class' => 'hide', 'id' => 'pdf-upload']) !!}
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="bottom">
				<div class="row">
					<div class="col-md-6">
						<a ng-click="save()" class="button pointer">@lang('material.save')</a>
						<a class="button pointer">@lang('material.cancel')</a>
					</div>
					<div class="col-md-6 text-right">
						<a ng-click="next()" ng-show="goNext" ng-hidden="!goNext" class="button pointer">@lang('material.next')</a>
						<a ng-click="back()" ng-show="goBack" ng-hidden="!goBack" class="button pointer">@lang('material.back')</a>
					</div>
				</div>
			</div>
	</div>
</section>
@endsection

@section('scripts')

	<script src="/scripts/my/material/create.js"></script>
@endsection