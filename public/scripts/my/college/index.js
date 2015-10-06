angular.module('view').controller('viewController', function($scope, $http){
	$scope.colleges = colleges;
	$scope.checkAlert = function(data){
		if(data && data.length == 0){
			$("#alertEmpty").removeClass("hide");
		}else{
			$("#alertEmpty").addClass("hide");
		}
	}
});