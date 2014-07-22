<?php

class Fuente extends Eloquent{

    protected $fillable=array('nombre','tipo');

    public function compromisos(){
        return $this->hasMany('Compromiso');
    }

    public function padre(){
        return $this->belongsTo('Fuente', 'fuente_padre_id', 'id');
    }

    public function hijos(){
        return $this->hasMany('Fuente', 'fuente_padre_id', 'id');
    }

    public function esHijoDe(Fuente $fuente){
        return $this->fuente_padre_id == $fuente->id;
    }

    public function tienePadre(){
        return count($this->padre) > 0;
    }

    public function tieneHijos(){
        return count($this->hijos) > 0;
    }

}