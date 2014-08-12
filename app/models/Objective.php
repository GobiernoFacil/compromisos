<?php

class Objective extends Eloquent{

  protected $fillable = [
    'step_id', 'step_num', 'status', 'description',
    'agent', 'agent_url', 'advance_description',
    'finish_description'
  ];

  public function step(){
    return $this->belongsTo('Step');
  }
}