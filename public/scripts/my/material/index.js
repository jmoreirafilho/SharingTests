angular.module('view').controller('viewController', function($scope, $http){
	$scope.materials = material;
	$scope.selected = function(pass){
		if(pass){
			return "option-hover";
		}
	}
	$scope.redirect = function(id){
		window.location.href = '/material/show/'+id;
	}
	$scope.checkAlert = function(data){
		if(data && data.length == 0){
			$("#alertEmpty").removeClass("hide");
		}else{
			$("#alertEmpty").addClass("hide");
		}
	}
});