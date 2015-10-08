angular.module('view').controller('viewController', function($scope, $http){
	$scope.user = user;
	if($scope.user.status_level == 0){
		$scope.isUser = true;
	} else {
		$scope.isUser = false;
	}
});