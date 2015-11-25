<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/pageJogadores', function () {
    return view('jogadores');
});

Route::get('/jogadores', function () {
    return App\Jogador::all();
});

Route::post("/jogadores",function(){
  return App\Jogador::create(Input::all());
});

Route::get("/jogadoresall",function(){
  return App\Jogador::all();
});

Route::get("/jogadordelete/{id}",function($id){
  $jogador = App\Jogador::find($id);
  $jogador->delete();
});

Route::post("/jogadorupdate",function(){

  $jogador = App\Jogador::find(Input::get('id'));
  $jogador->nome = Input::get('nome');
  $jogador->nacionalidade = Input::get('nacionalidade');
  $jogador->posicao = Input::get('posicao');
  $jogador->idade = Input::get('idade');
  $jogador->save();
});

/**  Routes Times  **/

Route::get('/', function () {
    return view('times');
});

Route::get("/times",function(){
  return App\Time::all();
});

Route::get("/timedelete/{id}",function($id){
  $time = App\Time::find($id);

//  if(!$time->jogadores){
    $time->delete();
  //  echo "1";
  //}else{
  //  echo  "0";
  //}
});

Route::post("/timeupdate",function(){
    $time = App\Time::find(Input::get('id'));
    $time->nome = Input::get('nome');
    $time->estado = Input::get('estado');
    $time->cidade = Input::get('cidade');
    $time->divisao = Input::get('divisao');
    $time->save();
});

Route::post("/times",function(){
  return App\Time::create(Input::all());
});
