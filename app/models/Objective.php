<?php

class Objective extends Eloquent{

  protected $fillable = [
    'step_id', 'title', 'step_num', 'status', 'description', 'mir_file',
    'agent', 'agent_url', 'advance_description', 'description_excerpt',
    'finish_description', 'event_num', 'url', 'comments', 'mir_url'
  ];

  public function step(){
    return $this->belongsTo('Step');
  }
}