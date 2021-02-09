<?php namespace App\Controllers;

use \App\Models\ViewRatingModel;

class Home extends BaseController
{
   public function __construct()
   {
      $this->session = session();
      $this->vRatingModel = new ViewRatingModel();
   }

	public function index()
	{
      $top_thread = $this->vRatingModel->topThread();
		return view('home', [
         'top_thread' => $top_thread
      ]);
	}

	//--------------------------------------------------------------------

}
