<?php namespace App\Controllers;

class User extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->validation = \Config\Services::Validation();
      $this->session = session();
   }
	public function index()
	{
      $userModel = new \App\Models\UserModel();
      $user = $userModel->findAll();
		return view('user/index', [
         'user' => $user
      ]);
	}

   public function view()
   {
      $id = $this->request->uri->getSegment(3);
      $userModel = new \App\Models\UserModel();
      $user = $userModel->find($id);
      return view('user/view', [
         'user' => $user
      ]);
   }

   public function create()
   {
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'user');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $userModel = new \App\Models\UserModel();
            $user = new \App\Entities\User();

            $user->fill($data);
            $user->role = 1;
            $user->avatar = $this->request->getFile('avatar');
            $user->created_by = 0;
            $user->created_at = date('Y-m-d H:i:s');
            $userModel->save($user);

            // insertID = mengambil id terakhir, hasil create user
            $id = $userModel->insertID();
            $segment = ['user', 'view', $id];
            $this->session->setFlashdata('success', 'Input Data Berhasil');
            return redirect()->to(base_url($segment));
         }
         // jika field error
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/user/create');
      }
      return view('user/create');
   }

   public function update()
   {
      $id = $this->request->uri->getSegment(3);
      $userModel = new \App\Models\UserModel();
      $user = $userModel->find($id);

      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'userupdate');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $user = new \App\Entities\User();

            $user->fill($data);
            if($this->request->getFile('avatar')->isValid()) {
               $user->avatar = $this->request->getFile('avatar');
               unlink('./uploads/'.$this->request->getPost('avatarOld'));
            }
            $user->updated_by = 0;
            $user->updated_at = date('Y-m-d H:i:s');
            $userModel->save($user);

            $segments = ['user', 'view', $id];
            $this->session->setFlashdata('success', 'Edit Data Berhasil');
            return redirect()->to(base_url($segments));
         }
         // jika field error
         $this->session->setFlashdata('errors', $errors);
         return redirect()->to('/user/update/' . $id);
      }

      return view('user/edit', [
         'user' => $user
      ]);
   }

   public function delete()
   {
      $id = $this->request->uri->getSegment(3);
      $userModel = new \App\Models\UserModel();
      $user = $userModel->find($id);
      $row = $user->avatar;
      unlink('./uploads/'. $row);
      $userModel->delete($id);
      $this->session->setFlashdata('success', 'Data Berhasil Dihapus');
      return redirect()->to('/user');
   }

	//--------------------------------------------------------------------

}
