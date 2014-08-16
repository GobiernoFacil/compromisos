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
	    	'commitments.description', 
	    	'u1.name AS government_user',
	    	'u1.charge AS government_charge',
	    	'u1.phone AS government_phone',
	    	'u1.username AS government_username',
	    	'u2.name AS society_user',
	    	'u2.charge AS society_charge',
	    	'u2.phone AS society_phone',
	    	'u2.username AS society_username')
	    ->with('steps')
	    ->get();
	   return View::make('compromisos.compromisos')
	     ->with('commitments', $commitments);
	}
}