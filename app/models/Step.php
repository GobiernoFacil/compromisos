<?php

class Step extends Eloquent{
  public function commitment(){
    return $this->belongsTo('Commitment');
  }

  public function events(){
    $this->hasMany('Event');
  }
}
