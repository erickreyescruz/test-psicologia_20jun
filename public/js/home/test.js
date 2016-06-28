myApp.config(function($stateProvider, $urlRouterProvider){

	$urlRouterProvider.otherwise("/");

  $stateProvider
	.state('inicio.test', {
		url: 'test/{name}/{id}',
		views: {
			'content': {
        'controller': 'testCtrl',
				'templateUrl': 'templates/test.html'
			}
		}
	});
});

myApp.controller('testCtrl', ['$scope', '$http', '$state', '$timeout', '$stateParams', '$templateCache', function($scope, $http, $state, $timeout, $stateParams, $templateCache){

var counter=0;
$scope.name = $stateParams.name;
$scope.id = $stateParams.id;
$scope.image_ant = "";
$scope.errores=0;

$scope.clearCache = function() {
    $templateCache.removeAll();
}


if ($scope.stop == false) {
	for(var i=0;i<10;i++){
		$timeout(function(){
			if($scope.responded==true){
					$scope.responded=false;
			}
			$scope.isNot=function(id_image){
				$scope.responded=true;
				console.log($scope.responded);
			   $http.post('api/v1/isNot',{'id_image': id_image, 'name': $scope.name})
			       .then(function(response){
							 console.log(response.data[0].nombre);
							 	if (response.data[0].nombre != $scope.name) {
							 		alert("No pertenece");
							 	} else {
									$scope.errores++;
									alert("Si pertenece");

									//$scope.saveError();
									if ($scope.errores==3) {
										alert("game over");
										$scope.stopTest();
										$scope.errores = 0;
										$http.post('api/v1/tresErrores',{'id_test':$scope.id})
										.then(function(response){
											console.log(200);
											alert('saved');
										}, function(){
											console.log(500);
										});
									} else {
										console.log("errores: "+ $scope.errores);
									}
							 	}
			       }, function(){
			               console.log(500);
						});
			}

			if($scope.stop==false){
			$scope.name = $stateParams.name;
			$http.post('api/v1/images')
				.then(function(response){
					console.log(200);
					$scope.image=response.data[0];
					alert($scope.image.random);
					console.log(response.data[0]);
					counter++;
					console.log(counter);
			}, function(){
				 console.log(500);
			});
			if($scope.responded==false){
				$timeout(function(){
					$http.post('api/v1/isNot',{'id_image': $scope.image.id, 'name': $scope.name})
					.then(function(response){
						console.log(response.data[0].nombre);
						 if (response.data[0].nombre != $scope.name) {
							 alert("No pertenece");
							 $scope.errores++;
							 console.log("errores: "+$scope.errores);
						 } else {
							 alert("Si pertenece");
						 }
					}, function(){
						console.log(500);
					});
				}, 5000);
			}
			}
			if($scope.errores==2){
				var userResponse=confirm('Usted tiene 3 errores, ¿Quiere continuar?');
				if(userResponse==false){
					$scope.stopTest();
					$http.post('api/v1/answer',{'id' : $scope.id, 'respuesta': 3})
					.then(function(response){
						if (response.data == 'ok') {
							console.log(200);
							console.log('guardado db');
							console.log(response);
						} else {
							console.log(300);
							console.log(response.data);
						}
					}, function(){
						console.log(500);
					});
				}
			}


			$timeout(function(){
				$scope.stopAllTest();
			}, 50000);
		}, i*5000);

		$state.go($state.current);

	}
}

$scope.stopAllTest=function(){
	$http.post('api/v1/answer',{'id' : $scope.id, 'respuesta': $scope.errores})
	.then(function(response){
		if (response.data == 'ok') {
			console.log(200);
			console.log('guardado db');
			console.log(response);
		} else {
			console.log(300);
			console.log(response.data);
		}
	}, function(){
		console.log(500);
	});
	alert('api test provado');
	$scope.mod_status();
	$scope.stop=true;
	$state.go('^');
}

$scope.stopTest=function(){
	alert($scope.errores+1);
	$scope.mod_status();
	$scope.stop=true;
	$state.go('^');
}




$scope.test_inicio=function(){
	/*$scope.name = $stateParams.name
		$http.post('api/v1/getImagesInCategory',{'nombre': name})
		.then(function(response){
			console.log(200);
			console.log(response);
			$scope.images=response.data;
		}, function(){
			console.log(500);
		});*/
}

$scope.mod_status = function(){
		$http.post('api/v1/mod_status',{'name' : $scope.name})
		.then(function(response){
			console.log(200);
			console.log(response);
		}, function(){
			console.log(500);
		});
}

}]);
