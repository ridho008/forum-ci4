<?php namespace App\Controllers;

use \App\Models\ViewRatingModel;
use \App\Models\ThreadModel;
use \App\Models\UserModel;

class Dashboard extends BaseController
{
   public function __construct()
   {
      $this->session = session();
      $this->vRatingModel = new ViewRatingModel();
      $this->threadModel = new ThreadModel();
      $this->userModel = new UserModel();
   }

	public function index()
	{
      $jumlah_user = $this->userModel->countAllResults();
      $jumlah_thread = $this->threadModel->countAllResults();

      $thread_per_kategori = $this->threadModel->select('COUNT(thread.id) AS jumlah, kategori.kategori')
      ->join('kategori', 'thread.id_kategori = kategori.id')
      ->groupBy('thread.id_kategori')
      ->get();

      $tahun_lahir_user = $this->userModel->select('YEAR(tgl_lahir) AS tahun_lahir, COUNT(id) AS jumlah')
      ->groupBy('YEAR(tahun_lahir)')
      ->get();

      $thread_per_rating = $this->threadModel->select('COUNT(thread.id) AS jumlahThread, rating.id_thread')
      ->join('rating', 'thread.id = rating.id_thread')
      ->groupBy('rating.id_thread')
      ->get();
		return view('dashboard/index', [
         'jumlah_thread' => $jumlah_thread,
         'jumlah_user' => $jumlah_user,
         'tahun_lahir_user' => $tahun_lahir_user,
         'thread_per_kategori' => $thread_per_kategori,
         'thread_per_rating' => $thread_per_rating,
      ]);
	}

	//--------------------------------------------------------------------

}
