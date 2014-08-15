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
	  $commitments = Commitment::leftjoin('users AS u1', 'u1.id', '=', 'commitments.government_user')
      ->leftjoin('users AS u2', 'u2.id', '=', 'commitments.society_user')
	    ->select(
	    	'commitments.id',
	    	'commitments.title', 
	    	'commitments.plan', 
	    	'u1.name AS government_user',
	    	'u2.name AS society_user')
	    ->with('steps')
	    ->get();
	   return View::make('compromisos.compromisos')
	     ->with('commitments', $commitments);
	}




}
