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
	});
	$scope.disabledClass = function(){
		if($scope.user.name){
			return "";
		}
		return "btn-disabled";
	};
	$scope.submit = function(){
		$("form").submit();
	};
	function currentFormatedData(){
		var user = $scope.user;
	    var data = new Date(user.created_at);
	    var dia = data.getDate();
	    if (dia.toString().length == 1)
	      	dia = "0"+dia;
	    var mes = data.getMonth()+1;
	    if (mes.toString().length == 1)
	      	mes = "0"+mes;
	    var ano = data.getFullYear();
	    $scope.user.created_at = dia+" / "+mes+" / "+ano;
	}
	currentFormatedData();
});