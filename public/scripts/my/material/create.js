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
	$scope.selectedCourseId = function(id){
		console.log(id);
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
			$scope.colleges = result;
		});
	};
	$scope.getCollegeId = function(id, name, initials){
		$scope.college_id = id;
		$scope.material.college = name+" ("+initials+")";
		$scope.showCourse = true;
		$http.get("/material/getCourses/"+id);
	};
});

$("#search_college").on('focus', function(){
	$("#typeahead").show(300);
}).on('blur', function(){
	$("#typeahead").hide(300);
});