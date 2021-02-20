<?php namespace App\Controllers;

use \App\Models\MessagesModel;
use \App\Models\UserModel;

class Messages extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->messagesModel = new MessagesModel();
      $this->userModel = new UserModel();
   }

	public function create()
	{
      $id_recepient = $this->request->uri->getSegment(3);
      $recepient = $this->userModel->find($id_recepient);

      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $messages = new \App\Entities\Messages();

         $messages->fill($data);
         $this->messagesModel->save($messages);
         $this->session->setFlashdata('success', 'Kirim Pesan Berhasil.');
         return redirect()->to('/messages/outbox');
      }

      return view('messages/create', [
         'recepient' => $recepient,
      ]);
	}

   public function inbox()
   {
      $messages = $this->messagesModel->select('user.nama AS nama, messages.messages AS message, messages.id as messages_id')
         ->join('user', 'user.id = messages.id_sender', 'left')
         ->where('id_recepient', $this->session->get('id'))
         ->findAll();

      return view('messages/inbox', [
         'messages' => $messages
      ]);
   }

   public function outbox()
   {
      $messages = $this->messagesModel->select('user.nama AS nama, messages.messages AS message, messages.id as messages_id')
         ->join('user', 'user.id = messages.id_recepient', 'left')
         ->where('id_sender', $this->session->get('id'))
         ->findAll();

      return view('messages/outbox', [
         'messages' => $messages
      ]);
   }

   public function view()
   {
      $id = $this->request->uri->getSegment(3);
      $messages = $this->messagesModel->find($id);

      if($messages->id_recepient == $this->session->get('id')) {
         $messages->is_read = 1;
         $this->messagesModel->save($messages);
      }


      $recepient = $this->userModel->find($messages->id_recepient);
      $sender = $this->userModel->find($messages->id_sender);
      return view('messages/view', [
         'messages' => $messages,
         'recepient' => $recepient,
         'sender' => $sender,
      ]);
   }

	//--------------------------------------------------------------------

}
