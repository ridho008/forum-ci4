<?php namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
      d(session()->get());
		return view('layout');
	}

	//--------------------------------------------------------------------

}
