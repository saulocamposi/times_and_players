var timesCtrl = function($scope,$http,$log){

  $http.get('_json/estados-cidades.json').then(function(response){

  $scope.estados = response.data;
  $scope.collEstados =   $scope.estados.estados;
  $scope.choice = null;
  }, onError);

  $http.get('_json/estados-cidades.json').then(function(response){
  $scope.cidades = response.data;
  }, onError);

  $http.get('_json/divisao.json').then(function(response){
      $scope.divisoes = response.data;
    },onError);

  var onSuccessTimesBd = function(response){

  $scope.timesbd = response.data;

  for (var i = 0; i < $scope.timesbd.length; i++){
    var timeBd  = {
        id : $scope.timesbd[i].id,
        nome : $scope.timesbd[i].nome,
        estado : $scope.timesbd[i].estado,
        cidade : $scope.timesbd[i].cidade,
        divisao : $scope.timesbd[i].divisao
    }
    $scope.times.collection.push(timeBd);
  }
    $scope.times.collection.splice(0,1);
  }

$http.get('_json/times.json').then(function(response){
    $scope.times = response.data;
  }, onError);

$http.get("times").then(onSuccessTimesBd, onError);

var onError = function(reason){
  $scope.error="Does not return" + reason;
}

  $scope.getTemplate = function (time) {
    console.log(time);
    if (time.id === $scope.times.selected.id)
      return 'edit';
        else
      return 'display';
  };

  $scope.edit = function (time) {
       $scope.times.selected = angular.copy(time);
   };

   var onSuccessCreate = function(response){
     $scope.retorno = response.data;
     var timeRetorno  = {
         id : $scope.retorno.id,
         nome : $scope.retorno.nome,
         estado : $scope.retorno.estado,
         cidade : $scope.retorno.cidade,
         divisao : $scope.retorno.divisao
     }
     $scope.times.collection.push(timeRetorno);
   }

   $scope.new = function(){
     var json = {
       nome: $scope.time,
       estado: $scope.estado.nome,
       cidade: $scope.cidade,
       divisao : $scope.divisao.divisao
     }
     $http.post("times", json).then(onSuccessCreate);
   }

   $scope.update = function(time){
     var json = {
       id : time.id,
       nome: time.nome,
       estado: time.estado.nome,
       cidade: time.cidade,
       divisao : time.divisao.categoria
     }
     $http.post("timeupdate", json).then(onSuccessUpdate);
     $scope.reset();
   }

   $scope.reset = function () {
           $scope.times.selected = {};
     };

    var onSuccessUpdate = function(response){
      
    }


   $scope.delete = function(id){
     var result = confirm("Deseja deletar o time ?");
       if(result===true){
         var index = getSelectedIndex(id);


         $http.get("timedelete/"+id).then(onSuccessTimesDelete,onErrorDelete);


            $scope.times.collection.splice(index,1);


        /*  if($scope.timesDelete == "0"){
          }else{
            alert("Há Jogadores associados ao time");

          }*/
       }
   }

   var onSuccessTimesDelete = function(response){
     $scope.timesDelete = response.data;
   }

   var onErrorDelete = function(response){
     $scope.timesDelete = response.data;
   }

   function getSelectedIndex(id){

     for (var i = 0; i < $scope.times.collection.length; i++){
       if ($scope.times.collection[i].id==id){
         return i;
       }
     }
       return -1;
   }


}

app.controller("timesCtrl",["$scope","$http","$log",timesCtrl]);
