angular.module('view').controller('viewHomeLoginModalController', function($scope, $http){
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	var timeoutEmail, timeoutPasswords;
	
	$scope.checkAll = function(data){
		if(data){
			if(data.name && data.email && (re.exec(data.email) != null) && data.pass1 && data.pass2 && (data.pass1 == data.pass2)){
				return "";
			}
		}
		return "btn-disabled";
	};

	$scope.submit = function(){
		if($scope.checkAll($scope.user) == ""){
			$("form").submit();
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
			}, 1500);
		}
	};

	$scope.checkPasswords = function(data){
		clearTimeout(timeoutPasswords);
		timeoutPasswords = setTimeout(function(){
			if(data && data.pass1 && data.pass2 && (data.pass1 == data.pass2)){
				$(".passwords").removeClass("has-error");
			} else {
				$(".passwords").addClass("has-error");
			}
		}, 1500);
	};

	$scope.removeErrors = function(){
		$(".passwords").removeClass("has-error");
		$("#emailContent").removeClass("has-error");
	}
});