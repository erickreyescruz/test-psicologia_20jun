myApp.config(function($stateProvider, $urlRouterProvider){

 	$urlRouterProvider.otherwise("/");

   $stateProvider
 	.state('inicio.supervisor', {
 		url: 'supervisor',
 		views: {
 			'content': {
         'controller': 'supervisorCtrl',
 				'templateUrl': 'templates/supervisor.html'
 			}
 		}
 	});
 });
 myApp.controller('supervisorCtrl', ['$scope', '$http', '$state', function($scope, $http, $state){
   $scope.usuarios = [];
   $scope.selected_user = [];
   $scope.query = {
     'filter': '',
     'order': 'id',
     'limit': 5,
     'page': 1
   }

   $scope.show_filters = false;

   $scope.view_columns = {
     "id": true,
     "nombre": true,
     "ap_paterno": true,
     "ap_materno": true
   }

   $scope.used_filters = {
     'status' : 1
   }


   $scope.get_users = function(){
     $http.post('api/v1/Users')
     .then(function(response){
       $scope.usuarios=response.data;
       console.log(200);
       console.log(response);
     }, function(response){
       console.log(500);
     });
   }
   $scope.usuario = {
     'usuario':'',
     'nombre':'',
     'ap_paterno':'',
     'ap_materno':'',
     'edad':'',
     'pass':'',
     'pass_r':''
   }
   $scope.new_user = function(){
           if ($scope.usuario.pass == $scope.usuario.pass_r) {
                   $http.post('api/v1/user/new',$scope.usuario)
                   .then(function(response){
                                   alert('Usuario agragado correctamente');
                                   console.log(200);
                                   console.log(response);
                                   $state.go($state.current, {}, {reload:true});
                   }, function(){
                           console.log(500);
                   });
           }else {
                   alert('Las contraseñas no coinciden');
           }
   }
   $scope.formStatus=false;
   $scope.showForm=function(){
     $scope.formStatus = !$scope.formStatus;
   }
   $scope.closeForm=function(){
     $scope.formStatus=false;
   }

   $scope.change_pass = function(d_pass_b,d_pass,d_pass_r){
           if (d_pass == d_pass_r) {
                   $http.post('api/v1/admin/change_pass',{'d_pass_b': d_pass_b, 'd_pass': d_pass, 'd_pass_r': d_pass_r })
                   .then(function(response){
                           if (response.data.msg == 'dif') {
                                   alert('Coloca tu contraseña actual');
                           }else {
                                   alert('Contraseña actualizada');
                           }
                   }, function(){
                           console.log(500);
                   });
           }else {
                   alert('Las contraseñas que quieres cambiar no coinciden');
           }
   }

 }]);
