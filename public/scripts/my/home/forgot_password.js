angular.module('view').controller('viewController', function($scope){
	$scope.disabledClass = function(){
		var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if(!$scope.email){
			return "btn-disabled";
			$("#email_content").addClass("has-error");
		} else if($scope.email && (re.exec($scope.email) === null)){
			$("#email_content").addClass("has-error");
			return "btn-disabled";
		}
		$("#email_content").removeClass("has-error");
		return "";
	};
	$scope.submit = function(){
		if($scope.disabledClass() === ""){
			$("form").submit();
		}
	}
});