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
	  
	    
	   $commitments = Commitment::all();

	   return View::make('compromisos.compromisos')
	     ->with('commitments', $commitments);
	}
}