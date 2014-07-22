<?php
/**
 * Created by PhpStorm.
 * User: nsilva
 * Date: 13-05-14
 * Time: 11:45
 */

class Hito extends Eloquent{

    protected $table = 'hitos';
    protected $fillable=array('descripcion','fecha_inicio','fecha_termino','ponderador','avance');

    public function getDates()
    {
        return array('updated_at','created_at','fecha_inicio','fecha_termino');
    }

    public function compromiso(){
        return $this->belongsTo('Compromiso');
    }

} 