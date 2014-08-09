<?php

class Commitment extends Eloquent{
  protected $fillable = ['title', 'plan', 'government_user', 'society_user'];

  public function steps(){
    return $this->hasMany('Step');
  }
}
