<?php

class Commitment extends Eloquent{
  protected $fillable = ['title', 'description', 'characteristics', 'status'];

  public function steps(){
    return $this->hasMany('Step');
  }

  public function users(){
    return $this->belongsToMany('User');
  }
}
