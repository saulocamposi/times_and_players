var mainCtrl = function($scope, $http){

$http.get('_json/nacionalidades.json').then(function(response){
  $scope.nacionalidades = response.data;
},onError);
$http.get('_json/posicao.json').then(function(response){
  $scope.posicoes = response.data;
},onError);
$http.get('_json/jogadores.json').then(function(response){
  $scope.jogadores = response.data;
},onError);
$http.get('times').then(function(response){
  $scope.times = response.data;
},onError);

var onSuccessJogadoresBd = function(response){

$scope.jogadoresbd = response.data;

for (var i = 0; i < $scope.jogadoresbd.length; i++){
  var json  = {
      id : $scope.jogadoresbd[i].id,
      nome : $scope.jogadoresbd[i].nome,
      nacionalidade : $scope.jogadoresbd[i].nacionalidade,
      posicao : $scope.jogadoresbd[i].posicao,
      idade : $scope.jogadoresbd[i].idade,
      time : $scope.jogadoresbd[i].time
  }
  $scope.jogadores.collection.push(json);
}
  $scope.jogadores.collection.splice(0,1);
}

$http.get("jogadores").then(onSuccessJogadoresBd, onError);

var onError = function(reason){
  alert("entry point" + reason);
  $scope.error="Does not return";
}

$scope.edit = function (jogador) {
     $scope.jogadores.selected = angular.copy(jogador);
 };

 $scope.delete = function(id){
   var result = confirm("Deseja deletar o jogador ?");
     if(result===true){
       var index = getSelectedIndex(id);
       $http.get("jogadordelete/"+id).then(onSuccessDelete);
       $scope.jogadores.collection.splice(index,1);
     }
 }

 var onSuccessDelete = function(response){
 }

 function getSelectedIndex(id){
   for (var i = 0; i < $scope.jogadores.collection.length; i++){

     if ($scope.jogadores.collection[i].id==id){
       return i;
     }
   }
     return -1;
 }



$scope.new = function(){

  var json = {
    nome: $scope.nomejogador,
    nacionalidade: $scope.nacionalidade.nacionalidade,
    posicao: $scope.posicao.posicao,
    idade : $scope.idade,
    time : $scope.time.nome,
    time_id : $scope.time.id
  }
  $http.post("jogadores", json).then(onSuccessCreate);
}

$scope.update = function(jogador){

  var json = {
    id : jogador.id,
    nome : jogador.nome,
    nacionalidade: jogador.nacionalidade,
    posicao: jogador.posicao,
    idade: jogador.idade,
    time : jogador.time
  }

  $http.post("jogadorupdate", json).then(onSuccessUpdate);
  $scope.reset();
}

var onSuccessUpdate = function(response){

}

$scope.reset = function () {
        $scope.jogadores.selected = {};
  };



var onSuccessCreate = function(response){
  $scope.jogadorCreated = response.data;
  var json  = {
      id : $scope.jogadorCreated.id,
      nome : $scope.jogadorCreated.nome,
      nacionalidade : $scope.jogadorCreated.nacionalidade,
      posicao : $scope.jogadorCreated.posicao,
      idade : $scope.jogadorCreated.idade,
      time : $scope.jogadorCreated.time
  }
  $scope.jogadores.collection.push(json);

}

$scope.getTemplate = function (jogador) {

  if (jogador.id === $scope.jogadores.selected.id)
    return 'edit';
      else
    return 'display';
};

}
app.controller("mainCtrl",["$scope","$http",mainCtrl]);
