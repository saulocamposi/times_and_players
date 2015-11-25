<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model {
  protected $guarded = [];

  public function jogadores(){
    return $this->hasMany('App\Jogador');
  }


}


?>
