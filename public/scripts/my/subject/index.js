angular.module('view').controller('viewController', function($scope, $http){
	$scope.subjects = subjects;
	$scope.search_changed = function(data){
		if(data){
			$http.get('/searchSubject/'+id+'/'+data).success(function(result){
				$scope.subjects = result;
			});
	 	} else{
	 		$scope.subjects = subjects;
	 	}
	};
	$scope.selected = function(pass){
		if(pass){
			return "option-hover";
		}
	}
	$scope.redirect = function(id){
		window.location = '/material/'+id;
	}
	$scope.checkAlert = function(data){
		if(data && data.length == 0){
			$("#alertEmpty").removeClass("hide");
		}else{
			$("#alertEmpty").addClass("hide");
		}
	}
});