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

    public function isLogin() {
      return $this->session->has('isLogin');
    }

    public function login()
    {
      $isLogin = $this->isLogin();

      if($isLogin){
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
        if(!password_verify($request['password'], $user['password'])){
          return redirect()->to('/login')->with('failed', 'Password salah');
        } else {
          $loginSession = [
            'isLogin' => true,
            'email' => $user['email'],
            'name' => $user['name'],
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
