<?php namespace App\Controllers;

class Auth extends BaseController
{
   public function __construct()
   {
      helper('form');
      $this->session = session();
      $this->validation = \Config\Services::Validation();
   }
	public function index()
	{
      if($this->request->getPost()) {
         $data = $this->request->getPost();
         $this->validation->run($data, 'login');
         $errors = $this->validation->getErrors();

         if(!$errors) {
            $userModel = new \App\Models\UserModel();
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $userModel->where('username', $username)->first();
            if($user) {
               // ambil field salt DB
               $salt = $user->salt;
               if($user->password == md5($salt.$password)) {
                  $session = [
                     'id' => $user->id,
                     'username' => $user->username,
                     'role' => $user->role,
                     'isLoggedIn' => true
                  ];
                  $this->session->set($session);
                  $this->session->setFlashdata('success', 'Masuk Sebagai ' . $username);
                  return redirect()->to('/home');
               } else {
                  // jika password salah
                  $this->session->setFlashdata('errors', ['Password Salah']);
                  return redirect()->to('/auth');
               }
            } else {
               // jika akun belum terdaftar
               $this->session->setFlashdata('errors', ['Belum Terdaftar']);
               return redirect()->to('/auth');
            }
         }
         // jika form error
         $this->session->setFlashdata('errors', $data);
         return redirect()->to('/auth');
      }
		return view('login');
	}

   public function register()
   {
      return view('register');
   }

   public function logout()
   {
      $this->session->destroy();
      $this->session->setFlashdata('success', ['Berhasil Logout']);
      return redirect()->to('/auth');
   }

	//--------------------------------------------------------------------

}
