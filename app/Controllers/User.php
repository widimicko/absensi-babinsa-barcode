<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Controllers\Auth;

class user extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->auth = new Auth();
    }

    public function index() {
      if (!$this->auth->isLogin()){
        return redirect()->to('/login');
      }

      return view('dashboard/users/users', [
        'users' => $this->userModel->findAll()
      ]);
    }

    public function store() {
      if (!$this->auth->isLogin()){
        return redirect()->to('/login');
      }

      if (!$this->validate([
        'name' => 'required',
        'email' => 'required|valid_email|is_unique[users.email]',
      ])) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
      }

      $this->userModel->insert([
        'name' => $this->request->getVar('name'),
        'email' => $this->request->getVar('email'),
      ]);

      return redirect()->to('/dashboard/users')->with('success', 'Data pengguna baru berhasil ditambahkan');
    }

    public function update($id) {
      if (!$this->auth->isLogin()){
        return redirect()->to('/login');
      }

      $rules = [
        'name' => 'required',
        'email' => 'required',
      ];

      $user = $this->userModel->find($id);

      if ($user['email'] != $this->request->getVar('email')) {
        $rules['email'] = 'required|valid_email|is_unique[users.email]';
      }

      if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
      }

      $this->userModel->update($id, [
        'name' => $this->request->getVar('name'),
        'email' => $this->request->getVar('email'),
      ]);

      return redirect()->to('/dashboard/users')->with('success', 'Data pengguna berhasil diperbaharui');
    }

    public function destroy($id) {
      if (!$this->auth->isLogin()){
        return redirect()->to('/login');
      }
      
      $this->userModel->delete($id);

      return redirect()->to('/dashboard/users')->with('success', 'pengguna berhasil dihapus');
    }
}
