myApp.controller('headerCtrl', ['$scope', '$http', '$state', '$timeout', function($scope, $http, $state, $timeout){
  $scope.datos = {
    'usuario':'',
    'password':''
  }

  $scope.isLogged = function(){
    $http.post('api/v1/isLogged')
    .then(function(response){
      $scope.status=true;
      console.log(200);
      console.log(response.data[0]);
      $scope.info = response.data[0];
      //alert(JSON.stringify(response.data[0]));
    }, function(response){
      console.log(500);
      $state.go('inicio');
    });
  }

  $scope.login = function(){
    if($scope.datos.usuario!=''&&$scope.datos.password!=''){
      $http.post('api/v1/login', $scope.datos)
      .then(function(response){
        if(response.data.code==200){
          console.log(200);
          console.log(response.data);
          $state.go('inicio.home');
          $scope.status=true;
          $scope.isLogged();
        }else{
          console.log(404);
          alert('No se encontro usuario');
        }
      }, function(response){
        console.log(500);
      });
    }else{
      alert('Favor de llenar todos los campos');
    }

  }
  $scope.logout = function(){
    $http.post('api/v1/logout')
    .then(function(response){
      console.log(200);
      console.log(response);
      $scope.datos = {
        'usuario':'',
        'password':''
      }
      $scope.status = false;
      $state.go('inicio');
    }, function(response){
      console.log(500);
    });
  }
  $scope.goHome=function(){
    $state.go('inicio.home');
    $scope.stop=true;
  }
  $scope.homeIcon=true;
  $scope.showHomeIcon=function(){
    $scope.homeIcon=true;
  }
  $scope.showHomeIcon();
  $scope.counter=5;
  $scope.top=0;
  $scope.validate=false;
  $scope.stop=false;
  $scope.countdown=function(){
    $timeout(function(){
      $scope.counter--;
      if($scope.top>=10){
        $scope.validate=true;
      }
      $scope.countdown();
      if($scope.counter==0){
        $scope.counter=5;
        $scope.top++;
      }
    }, 1000);
    if($scope.top>9){
      $state.go('inicio.home');
    }
  }
}]);
