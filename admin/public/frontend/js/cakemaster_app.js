var app=angular.module('CakeMaster',[]);
app.controller('cakeMakerCtrl',function($scope,$http){
	$scope.cake_ingredients="";
	$scope.cake_row=3;
	$scope.cake_col=3;
	$scope.cake_ingredientsQty=$scope.cake_row * $scope.cake_col;
	$scope.cake_name="Mi primer torta";
	$scope.cake_points=0;
	$scope.cake_ingredients_selected={};
	// get Ingredients
	$http.get('http://localhost/tortas/admin/public/api/getIngredients/0')
	.success(function(data){
		$scope.cake_ingredients=data['ingredients'];
	})
	.error(function(err){
		console.log(err);
	});

	$scope.getCakePoints=function(){
		$points=0;
		console.log($scope.cake_ingredients_selected);
		//console.log($scope.cake_ingredients_selected);
		//console.log($('td select option[selected="selected"]').html());
		//if()
	}

	//update Ingredients QTY
	$scope.updateIngredientsQty=function(){
		$scope.cake_ingredientsQty=$scope.cake_row * $scope.cake_col;
	}
	// Traigo los elementos seleccionados
	$scope.get_cake_ingredients_selected=function(){
		$scope.cake_ingredients_selected.push('num');
		console.log($scope.cake_ingredients_selected);
	}
	
	//$scope.checkIngredients();

});
