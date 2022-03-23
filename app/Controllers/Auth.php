<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = session();
    }

    public function login()
    {
      if($this->session->has('isLogin')){
        return redirect()->to('/dashboard');
      }

      return view('auth/login');
    }

    public function authenticate() {
      $request = $this->request->getPost();

      $user = $this->userModel->where('email', $request['email'])->first();
      
      if(!$user){
        return redirect()->to('/login')->with('failed', 'Akun tidak ditemukan');
      } else{
        if(!password_verify($user['password'], $request['password'])){
          return redirect()->to('/login')->with('failed', 'Password salah');
        } else {
          $loginSession = [
            'isLogin' => true,
            'username' => $user['username'],
            'role' => $user['role']
          ];

          $this->session->set($loginSession);
          return redirect()->to('/dashboard');
        }
      }
    }

    public function logout() {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}