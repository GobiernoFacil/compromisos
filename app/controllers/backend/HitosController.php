<?php

class HitosController extends BaseController{

    protected $layout='backend/template';

    public function getIndex(){
        return Redirect::to('backend/hitos/proximos');
    }

    public function getProximos(){
        $hitos=Hito::with('compromiso','compromiso.usuario')->where('fecha_termino','>=',\Carbon\Carbon::now()->toDateString())->orderBy('fecha_inicio')->with('compromiso');

        if(!Auth::user()->super){
            $hitos->whereHas('compromiso',function($q){$q->where('usuario_id',Auth::user()->id);});
        }

        $data['hitos']=$hitos->get();

        $this->layout->title='Próximos hitos relevantes';
        $this->layout->sidebar = View::make('backend/hitos/sidebar',array('item_menu'=>'hitos'));
        $this->layout->content= View::make('backend/hitos/proximos', $data);
    }

}