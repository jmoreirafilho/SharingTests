angular.module('view').controller('viewController', function($scope){
	$("#fake_button").click(function(){
		var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		if(re.exec($scope.email) === null){
			$("#email_content").addClass("has-error");
		} else{
			$("#email_content").removeClass("has-error");
			$("#confirm_button").click();
		}
	});
});