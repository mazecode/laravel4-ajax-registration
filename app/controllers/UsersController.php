<?php

class UsersController extends \BaseController {

	/**
	 * Show the form for creating a new user.
	 *
	 * @return Response
	 */
	public function create()
	{
    return View::make('register');
	}

  /**
   * Check if username exists
   * @return Response
   */
  public function username()
  {
    try
    {
      $user = User::findOrFail(Input::get('username'));
      return Response::json(array('taken'));
    } catch(Exception $e) {
      return Response::json(array('available'));
    }
  }
}
