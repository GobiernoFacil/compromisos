<?php

class Agent extends Eloquent{

  protected $fillable = ['objective_id', 'agent', 'agent_url'];

  public function objective(){
    return $this->belongsTo('Objective');
  }
}