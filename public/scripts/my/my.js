// angular
angular.module("view", []);
angular.module("view").controller("loginController", function($scope){
	$scope.forgotPass = function(){
		window.location = "/forgot_password";
	}
});

// jquery
$("#show-login").on('click', function(){
	$("#login").toggle(300);
});

$("input").attr('autocomplete','off');

$("#open-points").on('click', function(){
	$("#points").toggle(200);
});

angular.module("view").controller("menuController", function($scope){
	$scope.showHomeCreate = function(){
		console.log("hey");
		include('/scripts/my/home/create.js');
	}

});