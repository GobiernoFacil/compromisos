<?php

class Event extends Eloquent{

  public function step(){
    return $this->belongsTo('Step');
  }
}