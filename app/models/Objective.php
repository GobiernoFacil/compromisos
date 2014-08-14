<?php

class Objective extends Eloquent{

  protected $fillable = [
    'step_id', 'title', 'step_num', 'status', 'description',
    'agent', 'agent_url', 'advance_description',
    'finish_description', 'event_num', 'url'
  ];

  public function step(){
    return $this->belongsTo('Step');
  }
}