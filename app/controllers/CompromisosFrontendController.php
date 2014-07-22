<?php

class CompromisosFrontendController extends BaseController {

	protected $layout='template';


    public function getVer($compromiso_id){
        $this->layout->title = 'Compromiso';
        $this->layout->content = View::make('compromisos/ver', array('compromiso' => Compromiso::find($compromiso_id)));
    }

}
