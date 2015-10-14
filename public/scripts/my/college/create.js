$("#search_location").on('focus', function(){
	$("#typeahead").show(300);
}).on('blur', function(){
	$("#typeahead").hide(300);
});

angular.module('view').controller('viewCollegeCreateModalController', function($scope, $http){
	$scope.searching = function (data){
		$http.get('/searchLocation/' + data).success(function(result){
			if(result.length > 0){
				$scope.cities = result;
				$scope.emptyCityResult = false;
			} else {
				$scope.emptyCityResult = true;
			}
		});
	};
	$scope.getLocationId = function(data, city, state){
		$scope.location_city_id = data;
		$scope.search = city+" ("+state+")";
	};
	$scope.disabledClass = function(){
		if($scope.name && $scope.initials && $scope.search){
			return "";
		}
			return "btn-disabled";
	};
	$scope.submit = function(){
		$("form").submit();
	}
	$scope.clearAll = function(){
		$scope.name = null;
		$scope.initials = null;
		$scope.search = null;
	}
});