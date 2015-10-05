angular.module('view').controller('viewController', function($scope, $http){
	$scope.user = user;
	var status_password_view = true;
	$("label#change_password").click(function(){
		if(status_password_view){
			$("div#change_password").removeClass("hide", 400);
			status_password_view = false;
		} else {
			$("div#change_password").addClass("hide", 400);
			status_password_view = true;
		}
	})
});