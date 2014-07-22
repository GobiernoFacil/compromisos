<?php
/**
 * Created by PhpStorm.
 * User: nsilva
 * Date: 13-05-14
 * Time: 11:23
 */

class Compromiso extends Eloquent{

    protected $fillable = array('nombre','url','descripcion','objetivo','publico','avance_descripcion','plazo','presupuesto','departamento');

    public function fuente(){
        return $this->belongsTo('Fuente');
    }

    public function mediosDeVerificacion(){
        return $this->hasMany('MedioDeVerificacion');
    }

    public function usuario(){
        return $this->belongsTo('Usuario');
    }

    public function institucionResposablePlan(){
        return $this->belongsTo('Institucion','institucion_responsable_plan_id');
    }

    public function institucionResposableImplementacion(){
        return $this->belongsTo('Institucion','institucion_responsable_implementacion_id');
    }

    public function sectores(){
        return $this->belongsToMany('Sector');
    }

    public function tags(){
        return $this->belongsToMany('Tag');
    }

    public function hitos(){
        return $this->hasMany('Hito');
    }

    public function actores(){
        return $this->hasMany('Actor');
    }

    public function getAvanceAttribute(){
        $avance=0;
        foreach($this->hitos as $h){
            $avance+=$h->ponderador*$h->avance;
        }
        return $avance;
    }

    public function getEstadoAvanceAttribute(){
        if($this->avance==0){
            return 'Sin comenzar';
        }else if($this->avance > 0 && $this->avance < 0.25){
            return 'Comenzando';
        }else if($this->avance >= 0.25 && $this->avance < 0.75){
            return 'En desarrollo';
        }else if($this->avance >= 0.75 && $this->avance < 1){
            return 'Finalizando';
        }else{
            return 'Completado';
        }
    }

    public static function dataForAvanceChart($ids){
        $compromisos=self::with('hitos')->whereIn('id', $ids)->get();


        $data=array();
        foreach($compromisos as $c){
            $data[$c->estado_avance]['label']=$c->estado_avance;
            $data[$c->estado_avance]['data']=5;
        }

        return array_values($data);
    }

} 