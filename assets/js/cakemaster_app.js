angular.module('CakeMaster',[])
	.controller('getIngredientsCtrl',function($scope){
		$scope.height=4;
		$scope.width=4;
		$scope.ingredients_qty=$scope.height * $scope.width;
	});
