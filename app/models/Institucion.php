<?php

class Institucion extends Eloquent{

    protected $table='instituciones';
    protected $fillable=array('nombre','tipo');

    public function hijos(){
        return $this->hasMany('Institucion','institucion_padre_id');
    }

    public function padre(){
        return $this->belongsTo('Institucion','institucion_padre_id');
    }

    public function compromisos(){
        return $this->hasMany('Compromiso');
    }

    public function compromisosRelacionados(){
        return $this->belongsToMany('Compromiso');
    }

} 