<?php

class BackendController extends BaseController {

	protected $layout='backend/template';

	public function getIndex()
	{


        return Redirect::to('backend/compromisos');
	}

}
