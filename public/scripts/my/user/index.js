angular.module('view').controller('viewController', function($scope, $http){
	$scope.users = users;
	$scope.selected = function(pass){
		if(pass){
			return "option-hover";
		}
	}
	$scope.redirect = function(id){
		window.location.href = '/user/'+id;
	}
});