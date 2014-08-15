<?php

class Commitment extends Eloquent{
  protected $fillable = ['title', 'government_user', 'society_user', 'description', 'characteristics', 'status'];

  public function steps(){
    return $this->hasMany('Step');
  }
}
