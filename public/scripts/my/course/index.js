angular.module('view').controller('viewController', function($scope){
	$scope.courses = courses;
	$scope.selected = function(pass){
		if(pass){
			return "option-hover";
		}
	}
	$scope.redirect = function(id){
		window.location.href = '/subject/'+id;
	};
	$scope.goBack = function(){
		window.history.back();
	}
	$scope.checkAlert = function(data){
		if(data && data.length == 0){
			$("#alertEmpty").removeClass("hide");
		}else{
			$("#alertEmpty").addClass("hide");
		}
	}
});