angular.module('view').controller('viewController', function($scope){
	var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	$scope.checkEmail = function(email){
		var timeoutEmail;
		if(email){
			clearTimeout(timeoutEmail);
			timeoutEmail = setTimeout(function(){
				if(re.exec(email) === null){
					$("#email_content").addClass("has-error");
					return false;
				} else {
					$("#email_content").removeClass("has-error");
					return true;
				}
			}, 1500);
		}
		return false;
	};

	$scope.disabledClass = function(){
		console.log($scope.email);
		if($scope.checkEmail($scope.email)){
			return "";
		}
		return "btn-disabled";
		// if(!$scope.email){
		// 	return "btn-disabled";
		// 	$("#email_content").addClass("has-error");
		// } else if($scope.email && (re.exec($scope.email) === null)){
		// 	$("#email_content").addClass("has-error");
		// 	return "btn-disabled";
		// }
		// $("#email_content").removeClass("has-error");
		// return "";
	};

	$scope.submit = function(){
		if($scope.disabledClass() === ""){
			$("form").submit();
		}
	};
});