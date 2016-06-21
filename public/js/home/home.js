myApp.config(function($stateProvider, $urlRouterProvider){

	$urlRouterProvider.otherwise("/");

  $stateProvider
	.state('inicio.home', {
		url: 'home',
		views: {
			'content': {
        'controller': 'homeCtrl',
				'templateUrl': 'templates/home.html'
			}
		}
	});
});

myApp.controller('homeCtrl', ['$scope', '$http', '$state', '$timeout', function($scope, $http, $state, $timeout){
	$scope.get_test = function(){
               $http.post('api/v1/UsersCategories')
               .then(function(response){
								 //alert(JSON.stringify(response.data));
								 //alert(JSON.stringify(response.data[0]['id_categoria']));
                 $scope.UsersCategories=response.data;
                       console.log(200);
                       console.log(response.data);
               }, function(response){
                       console.log(500);
               });
       }

}]);
