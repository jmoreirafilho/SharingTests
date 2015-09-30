$("#search_location").on('focus', function(){
	$("#typeahead").show(300);
}).on('blur', function(){
	$("#typeahead").hide(300);
});

angular.module('view').controller('viewController', function($scope, $http){
	$scope.searching = function (data){
		$http.get('/searchLocation/'+data).success(function(result){
			$scope.cities = result;
		});
	};
	$scope.getLocationId = function(data, city, state){
		$scope.location_city_id = data;
		$scope.search = city+" ("+state+")";
	}
});