<?php namespace App\Controllers;

use \App\Models\ReplyModel;
use \App\Models\ThreadModel;

class Reply extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->validation = \Config\Services::Validation();
      $this->session = session();
      $this->replyModel = new ReplyModel();
      $this->threadModel = new ThreadModel();
   }

	public function create()
	{
      $id = $this->request->uri->getSegment(3);
      $thread = $this->threadModel->find($id);

      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $validate = $this->validation->run($data, 'reply');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $reply = new \App\Entities\Reply();
            $reply->fill($data);
            $this->replyModel->save($reply);

            $segments = ['thread', 'view', $id];
            $this->session->setFlashdata('success', 'Anda Berhasil Membuat Reply.');
            return redirect()->to(base_url($segments));
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/reply/create/'.$id);
      }

		return view('reply/create', [
         'thread' => $thread
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
         $writePath = './uploads/reply';
         $file->move($writePath, $fileName);
         $data = [
            "uploaded" => true,
            "url" => base_url('uploads/reply/'.$fileName),
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

   public function edit()
   {
      $id = $this->request->uri->getSegment(3);
      $reply = $this->replyModel->find($id);
      $thread = $this->threadModel->find($reply->id_thread);

      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $validate = $this->validation->run($data, 'reply');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $reply = new \App\Entities\Reply();
            $reply->fill($data);
            $this->replyModel->save($reply);

            $segments = ['thread', 'view', $reply->id_thread];
            $this->session->setFlashdata('success', 'Anda Berhasil Edit Reply.');
            return redirect()->to(base_url($segments));
         }
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/reply/edit/'.$id);
      }

      return view('reply/edit', [
         'reply' => $reply,
         'thread' => $thread,
      ]);
   }

   public function delete()
   {
      $id = $this->request->uri->getSegment(3);
      $id_thread = $this->request->uri->getSegment(4);
      $this->replyModel->delete($id);
      $this->session->setFlashdata('success', 'Delete Reply Berhasil.');
      return redirect()->to('/thread/view/'.$id_thread);
   }

	//--------------------------------------------------------------------

}
