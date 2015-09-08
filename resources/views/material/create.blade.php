@extends('layouts.master')

@section('title', trans('title.material-create'))

@section('content')
<section ng-controller="viewController">
	<div class="col-md-12">
		<div class="card">
			<div class="card-title">@lang('title.material-create')</div>
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
								<div class="typeahead" id="typeahead" ng-show="material.college">
									<div class="typeahead-option" ng-repeat='college in colleges' ng-click="getCollegeId(college.id, college.name, college.initials)">
										@{{college.name}} <strong>(@{{college.initials}})</strong>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6" ng-show="material.college" ng-hide="!material.college">
								<div class="sub-card">
									<ul class="nav nav-tabs">
									  	<li role="presentation" ng-click="active('selectCourse')" ng-class="scCourseClass"><a href="">@lang('material.select')</a></li>
									  	<li role="presentation" ng-click="active('createCourse')" ng-class="crCourseClass"><a href="">@lang('material.create')</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane body" ng-class="scCourseClass">
											{!! Form::label('course', trans('material.select_course')) !!}
											{!! Form::text('course', null, ['class'=>'form-control', 'ng-model' => 'material.course', 'placeholder' => trans('material.course_ph')]) !!}
										</div>
										<div  class="tab-pane body" ng-class="crCourseClass">
											{!! Form::label('course', trans('material.create_course')) !!}
											{!! Form::text('course', null, ['class'=>'form-control', 'ng-model' => 'material.course', 'placeholder' => trans('material.course_ph')]) !!}
										</div>
										@{{material.course}}
									</div>
								</div>
							</div>
							<div class="col-md-6" ng-show="material.course" ng-hide="!material.course">
								<div class="sub-card">
									<ul class="nav nav-tabs">
									  	<li role="presentation" ng-click="active('selectSubject')" ng-class="scSubjectClass"><a href="">Select</a></li>
									  	<li role="presentation" ng-click="active('createSubject')" ng-class="crSubjectClass"><a href="">Create</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane body" ng-class="scSubjectClass">
											{!! Form::label('subject', trans('material.select_subject')) !!}
											{!! Form::text('subject', null, ['class'=>'form-control', 'ng-model' => 'material.subject', 'placeholder' => trans('material.subject_ph')]) !!}
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
													Upload de PDF
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
			<div class="card-footer">
				<a ng-click="save()" class="btn-footer">@lang('material.save')</a>
				<a class="btn-footer">@lang('material.cancel')</a>
			</div>
	</div>
</section>
@endsection

@section('scripts')
<script>
	angular.module('view').controller('viewController', function($scope, $http){
		$scope.checkAll = function(data){
			if(data){
				if(data.name && data.email && data.pass1 && data.pass2 && (data.pass1 == data.pass2)){
					return false;
				}
			}
			return true;
		}
		$scope.configClass = "active";
		$scope.photoClass = "active";
		$scope.scCourseClass = "active";
		$scope.scSubjectClass = "active";

		$scope.active = function(data){
			if(data == 'material'){
				$scope.materialClass = "active";
				$scope.configClass = "";
			} else if(data == 'config'){
				$scope.materialClass = "";
				$scope.configClass = "active";
			} else if(data == 'selectCourse'){
				$scope.scCourseClass = "active";
				$scope.crCourseClass = "";
			} else if(data == 'createCourse'){
				console.log("hey");
				$scope.scCourseClass = "";
				$scope.crCourseClass = "active";
			} else if(data == 'selectSubject'){
				$scope.scSubjectClass = "active";
				$scope.crSubjectClass = "";
			} else{//createSubject
				$scope.scSubjectClass = "";
				$scope.crSubjectClass = "active";
			}
		}
		$scope.selectUpload = function(data){
			if(data == 'photo'){
				$scope.photoClass = "active";
				$scope.pdfClass = "";
			} else{
				$scope.photoClass = "";
				$scope.pdfClass = "active";
			}
		}
		$scope.searchingColleges = function (data){
			$http.get('/searchCollege/'+data).success(function(result){
				console.log(result);
				$scope.colleges = result;
			});
		};
		$scope.getCollegeId = function(id, name, initials){
			$scope.college_id = id;
			$scope.material.college = name+" ("+initials+")";
		}
	});
</script>
<script>
	$("#search_college").on('focus', function(){
		$("#typeahead").show(300);
	}).on('blur', function(){
		$("#typeahead").hide(300);
	});
</script>
@endsection