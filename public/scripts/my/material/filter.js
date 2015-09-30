angular.module('view').controller('viewController', function($scope, $http){
	$scope.materials = material;
	$scope.selected = function(pass){
		if(pass){
			return "option-hover";
		}
	};
	$scope.showMaterial = function(link){
		window.open('/'+link, '_blank');
	};
	$scope.recuseMaterial = function(id, data){
		$http.post('/updateFiltered/'+id, {status:'recused'}).success(function(){
			window.location = "/filter";
		});
	};
	$scope.approveMaterial = function(id){
		$http.post('/updateFiltered/'+id, {status:'approved'}).success(function(){
			window.location = "/filter";
		});
	};
	$scope.showDescriptions = function(id){
		return true;
	};
});