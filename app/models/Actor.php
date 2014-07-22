<?php
/**
 * Created by PhpStorm.
 * User: nsilva
 * Date: 13-05-14
 * Time: 11:45
 */

class Actor extends Eloquent{

    protected $table = 'actores';
    protected $fillable=array('nombre');

    public function compromiso(){
        return $this->belongsTo('Compromiso');
    }

} 