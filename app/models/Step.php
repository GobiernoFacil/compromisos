<?php

class Step extends Eloquent{

  protected $fillable = ['commitment_id', 'ends', 'step_num'];
  
  public function commitment(){
    return $this->belongsTo('Commitment');
  }

  public function events(){
    $this->hasMany('Event');
  }
}
