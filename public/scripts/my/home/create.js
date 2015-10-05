angular.module('view').controller('viewController', function($scope){
	$scope.checkAll = function(data){
		if(data){
			if(data.name && data.email && data.pass1 && data.pass2 && (data.pass1 == data.pass2)){
				return "";
			}
		}
		return "btn-disabled";
	};
	$scope.submit = function(){
		if($scope.checkAll($scope.user) == ""){
			$("form").submit();
		}
	}
});