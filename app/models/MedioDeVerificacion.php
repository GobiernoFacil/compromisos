<?php
/**
 * Created by PhpStorm.
 * User: nsilva
 * Date: 13-05-14
 * Time: 11:45
 */

class MedioDeVerificacion extends Eloquent{

    protected $table = 'medios_de_verificacion';
    protected $fillable=array('tipo','descripcion','url');

    public function compromiso(){
        return $this->belongsTo('Compromiso');
    }

} 