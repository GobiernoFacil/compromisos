<?php
/**
 * Created by PhpStorm.
 * User: nsilva
 * Date: 13-05-14
 * Time: 12:15
 */

class Tag extends Eloquent{

    protected $fillable=array('nombre');

    public function compromisos(){
        return $this->belongsToMany('Compromiso');
    }
} 