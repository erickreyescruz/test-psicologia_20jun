myApp.config(function($stateProvider, $urlRouterProvider){

	$urlRouterProvider.otherwise("/");

  $stateProvider
	.state('inicio.user', {
		url: 'user/{id}',
		views: {
			'content': {
        'controller': 'userCtrl',
				'templateUrl': 'templates/user.html'
			}
		}
	});
});
myApp.controller('userCtrl', ['$scope', '$http', '$state', '$timeout', '$stateParams', '$templateCache', function($scope, $http, $state, $timeout, $stateParams, $templateCache){
  $scope.one_user = [];
  $scope.id = $stateParams.id;
  $scope.cat = [];

  $scope.one_user = function(){

    $scope.getCategories();
    $scope.id = $stateParams.id;
    $http.post('api/v1/user/edit',{'id_user': $scope.id})
    .then(function(response){
      $scope.one_user=response.data;
      console.log(200);
      console.log(response);
    }, function(response){
      console.log(500);
    });
  }

  $scope.test = function(){
    $scope.id = $stateParams.id;
    $http.post('api/v1/user/test',{'id_user': $scope.id})
    .then(function(response){
      $scope.test_user=response.data;
      console.log(200);
      console.log(response);
    }, function(response){
      console.log(500);
    });
  }



  $scope.calif = function(){
    $scope.id = $stateParams.id;
    $http.post('api/v1/user/calif',{'id_user': $scope.id})
    .then(function(response){
      $scope.calif=response.data.result;
      //alert(JSON.stringify(response.data.result));
      console.log(200);
      console.log(response);
    }, function(response){
      console.log(500);
    });
  }

  $scope.getCategories = function(){
          $http.post('api/v1/categories')
          .then(function(response){
                  console.log(200);
                  console.log(response);
                  $scope.cat=response.data;
          }, function(){
                  console.log(500);
          });
  }

  $scope.new_test = function(select){
    $scope.id = $stateParams.id;
    $http.post('api/v1/new_test',{'id_user': $scope.id, 'category': select})
    .then(function(response){
            console.log(200);
            console.log(response);
            alert("Test creado correctamente");
    }, function(){
            console.log(500);
    });
  }

}]);
