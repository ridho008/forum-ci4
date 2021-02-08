<?php namespace App\Controllers;

use \App\Models\ThreadModel;
use \App\Models\KategoriModel;
use \App\Models\UserModel;
use \App\Models\ReplyModel;

class Thread extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->threadModel = new threadModel();
      $this->kategoriModel = new KategoriModel();
      $this->replyModel = new ReplyModel();
      $this->userModel = new UserModel();
      $this->validation = \Config\Services::Validation();
      $this->session = session();
   }
	public function index()
	{
      $threads = $this->threadModel->getJoin();
		return view('thread/index', [
         'threads' => $threads
      ]);
	}

   public function view()
   {
      $id = $this->request->uri->getSegment(3);
      $thread = $this->threadModel->find($id);
      $kategori = $this->kategoriModel->find($thread->id_kategori);
      $user = $this->userModel->find($thread->created_by);
      $reply = $this->replyModel->getJoin($id);
      return view('thread/view', [
         'thread' => $thread,
         'kategori' => $kategori,
         'user' => $user,
         'reply' => $reply
      ]);
   }

   public function create()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'thread');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $thread = new \App\Entities\Thread();

            $thread->fill($data);
            $thread->created_by = session()->get('id');
            $thread->created_at = date('Y-m-d H:i:s');
            $this->threadModel->save($thread);

            // mengambil id yang baru dibuat
            $id = $this->threadModel->insertID();
            $segments = ['thread', 'view', $id];
            $this->session->setFlashdata('success', 'Input Thread Berhasil.');
            return redirect()->to(base_url($segments));
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/thread/create');
      }
      $kategori = $this->kategoriModel->findAll();
      $arrayKategori = [];
      foreach ($kategori as $kate) {
         $arrayKategori[$kate->id] = $kate->kategori;
      }
      return view('thread/create', [
         'arrayKategori' => $arrayKategori
      ]);
   }

   public function uploadImages()
   {
      $validate = $this->validate([
         'upload' => [
            'uploaded[upload]',
            'mime_in[upload,image/jpg,image/jpeg,image/png]',
            'max_size[upload,1024]'
         ]
      ]);

      if($validate) {
         $file = $this->request->getFile('upload');
         $fileName = $file->getRandomName();
         $writePath = './uploads/threads';
         $file->move($writePath, $fileName);
         $data = [
            "uploaded" => true,
            "url" => base_url('uploads/threads/'.$fileName),
         ];
      } else {
         $data = [
            "uploaded" => false,
            "error" => [
               "messages" => $file
            ]
         ];
      }
      return $this->response->setJSON($data);
   }

   public function update()
   {
      $id = $this->request->uri->getSegment(3);
      $thread = $this->threadModel->find($id);

      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'thread');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $thread = new \App\Entities\Thread();

            $thread->fill($data);
            $thread->updated_by = session()->get('id');
            $thread->updated_at = date('Y-m-d H:i:s');
            $this->threadModel->save($thread);

            $segments = ['thread', 'view', $id];
            $this->session->setFlashdata('success', 'Update Thread Berhasil.');
            return redirect()->to(base_url($segments));
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/thread/update/'. $id);
      }


      $kategori = $this->kategoriModel->findAll();
      $arrayKategori = [];
      foreach ($kategori as $kate) {
         $arrayKategori[$kate->id] = $kate->kategori;
      }
      return view('thread/update', [
         'arrayKategori' => $arrayKategori,
         'thread' => $thread
      ]);
   }

   public function delete()
   {
      $id = $this->request->uri->getSegment(3);
      $this->threadModel->delete($id);
      $this->session->setFlashdata('success', 'Delete Thread Berhasil.');
      return redirect()->to('/thread');
   }

	//--------------------------------------------------------------------

}
