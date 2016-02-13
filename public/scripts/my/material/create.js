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

	$("#upa").click(function(){
		console.log("hey");
		$("#pdf-upload").click();
	});

	$scope.active = function(data){
		switch(data){
			case 'material':
			$scope.materialClass = "active";
			$scope.configClass = "";
			break;
			case 'config':
			$scope.materialClass = "";
			$scope.configClass = "active";
			break;
			case 'selectCourse':
			$scope.scCourseClass = "active";
			$scope.crCourseClass = "";
			break;
			case 'createCourse':
			$scope.scCourseClass = "";
			$scope.crCourseClass = "active";
			$scope.material.course = "";
			$scope.subjects = "";
			break;
			case 'selectSubject':
			$scope.scSubjectClass = "active";
			$scope.crSubjectClass = "";
			break;
			case 'createSubject':
			$scope.scSubjectClass = "";
			$scope.crSubjectClass = "active";
			$scope.material.subject = "";
			break;
		}
	}
	$scope.selectedCourseId = function(id){
		$http.get("/material/getSubjects/"+id).success(function(subjects){
			$scope.subjects = subjects;
		});
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
		$scope.showCourse = false;
		$http.get('/searchCollege/'+data).success(function(result){
			if(result.length > 0){
				$scope.colleges = result;
				$scope.emptyCityResult = false;
			} else {
				$scope.emptyCityResult = true;
			}
		});
	};
	$scope.getCollegeId = function(id, name, initials){
		$scope.material.college = name+" ("+initials+")";
		setTimeout(function(){$("div#typeahead").addClass("ng-hide");});
		$scope.college_id = id;
		$scope.showCourse = true;
		$http.get("/material/getCourses/"+id).success(function(courses){
			$scope.courses = courses;
		});
	};
	$scope.goBack = false;
	$scope.goNext = true;
	$scope.next = function(){
		$scope.active('material');
		$scope.goBack = true;
		$scope.goNext = false;
	}
	$scope.back = function(){
		$scope.active('config');
		$scope.goBack = false;
		$scope.goNext = true;
	}
});

$("#search_college").on('focus', function(){
	$("#typeahead").show(300);
}).on('blur', function(){
	$("#typeahead").hide(300);
});