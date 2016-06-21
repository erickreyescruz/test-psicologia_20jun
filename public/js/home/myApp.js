var myApp = angular.module('App', ['ui.router', 'ngMaterial', 'ngMdIcons', 'ngAnimate', 'md.data.table']);

myApp.config(function($stateProvider, $urlRouterProvider){

	$urlRouterProvider.otherwise("/");

  $stateProvider
	.state('inicio', {
		url: '/',
		views: {
			'header': {
				'templateUrl': 'templates/header.html'
			},
			'content': {
				'templateUrl': 'templates/content.html'
			}
		}
	});
});

myApp.controller('registerCtrl', ['$scope', '$http', '$state', function($scope, $http, $state){
	$scope.nuevo = {
		'usuario':'',
		'nombre':'',
		'ap_paterno':'',
		'ap_materno':'',
		'edad':'',
		'password':''
	}
	$scope.save = function(){
		$http.post('api/v1/register', $scope.nuevo)
		.then(function(response){
			if(response.data==500){
 				alert('Favor de llenar todos los datos');
 			}else{
 				console.log(200);
 				alert('Se guardo exitosamente');
 				$state.go($state.current,{}, {reload:true});
 			}
		}, function(response){
			console.log(500);
		});
	}
}]);
