<?php

class CommitmentFrontController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	  //
	  
	   // ordena compromisos por número de compromiso 
	   $commitments = Commitment::orderBy('commitment_num', "ASC")->get();

	   return View::make('compromisos.compromisos')
	     ->with('commitments', $commitments);
	}
}