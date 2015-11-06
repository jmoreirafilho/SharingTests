angular.module('view').controller('viewHomeLoginModalController', function($scope, $http){
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var timeoutEmail, timeoutPasswords;

	$scope.forgotPassword = function(){
		window.location = "/forgot_password";
	};
	
	$scope.checkAll = function(data){
		if(data){
			if(data.email && (re.exec(data.email) != null) && data.pass){
				return "";
			}
		}
		return "btn-disabled";
	};

	$scope.submit = function(){
		if($scope.checkAll($scope.login) == ""){
			$("#formLogin").submit();
		}
	};

	$scope.checkEmail = function(data){
		if(data){
			clearTimeout(timeoutEmail);
			timeoutEmail = setTimeout(function(){
				if(data.email && re.exec(data.email) === null){
					$("#emailContent").addClass("has-error");
				} else {
					$("#emailContent").removeClass("has-error");
				}
			}, 1000);
		}
	};

	$scope.removeErrors = function(){
		$("#emailContent").removeClass("has-error");
	}
});