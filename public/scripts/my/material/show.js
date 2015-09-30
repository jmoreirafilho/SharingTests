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
});